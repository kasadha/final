<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Threebed;
use Carbon\Carbon;

class ThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $threebeds = Threebed::all();
      return view('admin.threebed.index',compact('threebeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.threebed.create');

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
            if (!file_exists('images/threebed'))
            {
                mkdir('images/threebed', 0777 , true);
            }
            $image->move('images/threebed',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $threebed = new Threebed();
        $threebed->title = $request->title;
        $threebed->description = $request->description;
        $threebed->price = $request->price;
        $threebed->image = $imagename;
        $threebed->save();
        return redirect()->route('threebed.index')->with('successMsg','Team Successfully saved');

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
        $threebed = Threebed::find($id);
        return view('admin.threebed.edit',compact('threebed'));

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
        $threebed = Threebed::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/threebed'))
            {
                mkdir('images/threebed', 0777 , true);
            }
            $image->move('images/threebed',$imagename);
        }else {
            $imagename = $threebed->image;
        }

        $threebed->title = $request->title;
        $threebed->price = $request->price;
        $threebed->description = $request->description;
        $threebed->image = $imagename;
        $threebed->save();
        return redirect()->route('threebed.index')->with('successMsg','Team Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $threebed = Threebed::find($id);
      if (file_exists('images/threebed/'.$threebed->image))
      {
          unlink('images/threebed/'.$threebed->image);
      }
      $threebed->delete();
      return redirect()->back()->with('successMsg','Threebed Successfully Deleted');

    }
}
