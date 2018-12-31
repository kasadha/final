<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fourbed;
use Carbon\Carbon;

class FourbedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fourbeds = Fourbed::all();
      return view('admin.fourbed.index',compact('fourbeds'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fourbed.create');
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
            if (!file_exists('images/fourbed'))
            {
                mkdir('images/fourbed', 0777 , true);
            }
            $image->move('images/fourbed',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $fourbed = new Fourbed();
        $fourbed->title = $request->title;
        $fourbed->description = $request->description;
        $fourbed->price = $request->price;
        $fourbed->image = $imagename;
        $fourbed->save();
        return redirect()->route('fourbed.index')->with('successMsg','Team Successfully saved');

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
        $fourbed = Fourbed::find($id);
        return view('admin.fourbed.edit',compact('fourbed'));

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
        $fourbed = Fourbed::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/fourbed'))
            {
                mkdir('images/fourbed', 0777 , true);
            }
            $image->move('images/fourbed',$imagename);
        }else {
            $imagename = $fourbed->image;
        }

        $fourbed->title = $request->title;
        $fourbed->price = $request->price;
        $fourbed->description = $request->description;
        $fourbed->image = $imagename;
        $fourbed->save();
        return redirect()->route('fourbed.index')->with('successMsg','Team Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fourbed = Fourbed::find($id);
      if (file_exists('images/fourbed/'.$fourbed->image))
      {
          unlink('images/fourbed/'.$fourbed->image);
      }
      $fourbed->delete();
      return redirect()->back()->with('successMsg','Towbed Successfully Deleted');

    }
}
