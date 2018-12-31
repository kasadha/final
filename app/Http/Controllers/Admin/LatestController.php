<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Design;
use Carbon\Carbon;

class LatestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $designs = Design::all();
        return view('admin.design.index',compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.design.create');

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
            'detail' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/design'))
            {
                mkdir('images/design', 0777 , true);
            }
            $image->move('images/design',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $design = new Design();
        $design->title = $request->title;
        $design->price = $request->price;
        $design->detail = $request->detail;
        $design->description = $request->description;
        $design->image = $imagename;
        $design->save();
        return redirect()->route('design.index')->with('successMsg','Team Successfully saved');
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
        $design =  Design::find($id);
        return view('admin.design.edit',compact('design'));
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
            'detail' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $design = Design::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('images/design'))
            {
                mkdir('images/design', 0777 , true);
            }
            $image->move('images/design',$imagename);
        }else {
            $imagename = $design->image;
        }

        $design->title = $request->title;
        $design->description = $request->description;
        $design->detail = $request->detail;
        $design->price = $request->price;
        $design->image = $imagename;
        $design->save();
        return redirect()->route('design.index')->with('successMsg','Team Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $design = Design::find($id);
      if (file_exists('images/design/'.$design->image))
      {
          unlink('images/design/'.$design->image);
      }
      $design->delete();
      return redirect()->back()->with('successMsg','Design Successfully Deleted');

    }
}
