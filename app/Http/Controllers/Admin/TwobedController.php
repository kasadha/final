<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Towbed;
use Carbon\Carbon;

class TwobedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towbeds = Towbed::all();
        return view('admin.towbed.index',compact('towbeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.towbed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/towbed'))
            {
                mkdir('images/towbed', 0777 , true);
            }
            $image->move('images/towbed',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $towbed = new Towbed();
        $towbed->title = $request->title;
        $towbed->description = $request->description;
        $towbed->price = $request->price;
        $towbed->image = $imagename;
        $towbed->save();
        return redirect()->route('towbed.index')->with('successMsg','Team Successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $towbed = Towbed::find($id);
        return view('admin.towbed.edit',compact('towbed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $towbed = Towbed::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/towbed'))
            {
                mkdir('images/towbed', 0777 , true);
            }
            $image->move('images/towbed',$imagename);
        }else {
            $imagename = $towbed->image;
        }

        $towbed->title = $request->title;
        $towbed->price = $request->price;
        $towbed->description = $request->description;
        $towbed->image = $imagename;
        $towbed->save();
        return redirect()->route('towbed.index')->with('successMsg','Team Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $towbed = Towbed::find($id);
      if (file_exists('images/towbed/'.$towbed->image))
      {
          unlink('images/towbed/'.$towbed->image);
      }
      $towbed->delete();
      return redirect()->back()->with('successMsg','Towbed Successfully Deleted');

    }
}
