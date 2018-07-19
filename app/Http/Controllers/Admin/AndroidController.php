<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Android;
class AndroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $android=Android::orderBy('updated_at', 'desc')->first();
        return view('Admin.admin_pages.android',['android'=>$android]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
        'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        'android_header' => 'required',
        'android_description' => 'required',
        'android_video' => 'required|url',
        ];
        $messages = [
            'url'  => ' the :attribute  must be a valid URL',
            'required'  => 'the :attribute must be present in the input data and not empty',
            'images'=>'the :attribute must be an image',
            'alpha'=>'the :attribute must be entirely alphabetic characters'
            


        ];

        $data=$this->validate($request,$rules,$messages);


        $android=new Android;

        $img=$request->img;
        $filename=time().'.'. $img->getClientOriginalExtension();

         // $location=public_path('images/'.$filename);
          $location = public_path('/images');
          $img->move($location, $filename);
          $android->img=$filename;

        $android->header            =  $request->android_header;
        $android->description       =  $request->android_description;
        $android->url               =  $request->android_video;

        $android->save();
        return redirect()->route('admin.android');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules= [
        'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        'android_header' => 'required',
        'android_description' => 'required',
        'android_video' => 'required|url',
        ];
        $messages = [
            'url'  => ' the :attribute  must be a valid URL',
            'required'  => 'the :attribute must be present in the input data and not empty',
            'images'=>'the :attribute must be an image',
            'alpha'=>'the :attribute must be entirely alphabetic characters'
            


        ];

        $data=$this->validate($request,$rules,$messages);


        $android=Android::orderBy('updated_at','desc')->first();

        $img=$request->img;
        $filename=time().'.'. $img->getClientOriginalExtension();

         // $location=public_path('images/'.$filename);
          $location = public_path('/images');
          $img->move($location, $filename);
          $android->img=$filename;

        $android->header            =  $request->android_header;
        $android->description       =  $request->android_description;
        $android->url               =  $request->android_video;

        $android->save();
        return redirect()->route('admin.android');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
