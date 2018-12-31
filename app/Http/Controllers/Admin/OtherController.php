<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Other;
use Carbon\Carbon;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $others = Other::all();
      return view('admin.other.index',compact('others'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.other.create');

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
          if (!file_exists('images/other'))
          {
              mkdir('images/other', 0777 , true);
          }
          $image->move('images/other',$imagename);
      }else {
          $imagename = 'default.png';
      }

      $other = new Other();
      $other->title = $request->title;
      $other->description = $request->description;
      $other->price = $request->price;
      $other->image = $imagename;
      $other->save();
      return redirect()->route('other.index')->with('successMsg','Team Successfully saved');

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
      $other = Other::find($id);
      return view('admin.other.edit',compact('other'));

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
      $other = Other::find($id);
      if (isset($image))
      {
          $currentDate = Carbon::now()->toDateString();
          $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
          if (!file_exists('images/other'))
          {
              mkdir('images/other', 0777 , true);
          }
          $image->move('images/other',$imagename);
      }else {
          $imagename = $other->image;
      }

      $other->title = $request->title;
      $other->price = $request->price;
      $other->description = $request->description;
      $other->image = $imagename;
      $other->save();
      return redirect()->route('other.index')->with('successMsg','Team Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $other = Other::find($id);
    if (file_exists('images/other/'.$other->image))
    {
        unlink('images/other/'.$other->image);
    }
    $other->delete();
    return redirect()->back()->with('successMsg','Other Successfully Deleted');


    }
}
