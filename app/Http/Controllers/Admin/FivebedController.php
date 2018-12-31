<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fivebed;
use Carbon\Carbon;

class FivebedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fivebeds = Fivebed::all();
      return view('admin.fivebed.index',compact('fivebeds'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.fivebed.create');

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
          if (!file_exists('images/fivebed'))
          {
              mkdir('images/fivebed', 0777 , true);
          }
          $image->move('images/fivebed',$imagename);
      }else {
          $imagename = 'default.png';
      }

      $fivebed = new Fivebed();
      $fivebed->title = $request->title;
      $fivebed->description = $request->description;
      $fivebed->price = $request->price;
      $fivebed->image = $imagename;
      $fivebed->save();
      return redirect()->route('fivebed.index')->with('successMsg','Team Successfully saved');

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
      $fivebed = Fivebed::find($id);
      return view('admin.fivebed.edit',compact('fivebed'));

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
      $fivebed = Fivebed::find($id);
      if (isset($image))
      {
          $currentDate = Carbon::now()->toDateString();
          $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
          if (!file_exists('images/fivebed'))
          {
              mkdir('images/fivebed', 0777 , true);
          }
          $image->move('images/fivebed',$imagename);
      }else {
          $imagename = $fivebed->image;
      }

      $fivebed->title = $request->title;
      $fivebed->price = $request->price;
      $fivebed->description = $request->description;
      $fivebed->image = $imagename;
      $fivebed->save();
      return redirect()->route('fivebed.index')->with('successMsg','Fivebed Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $fivebed = Fivebed::find($id);
    if (file_exists('images/fivebed/'.$fivebed->image))
    {
        unlink('images/fivebed/'.$fivebed->image);
    }
    $fivebed->delete();
    return redirect()->back()->with('successMsg','Fivebed Successfully Deleted');


    }
}
