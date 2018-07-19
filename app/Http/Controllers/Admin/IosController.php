<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Ios;
class IosController extends Controller
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
        $ios=Ios::orderBy('updated_at', 'desc')->first();
        return view('Admin.admin_pages.ios',['ios'=>$ios]);
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
        'ios_header' => 'required',
        'ios_description' => 'required',
        'ios_video' => 'required|url',
        ];
        $messages = [
            'url'  => ' the :attribute  must be a valid URL',
            'required'  => 'the :attribute must be present in the input data and not empty',
            'images'=>'the :attribute must be an image',
            'alpha'=>'the :attribute must be entirely alphabetic characters'
            


        ];

        $data=$this->validate($request,$rules,$messages);


        $ios=new Ios;

        $img=$request->img;
        $filename=time().'.'. $img->getClientOriginalExtension();

         // $location=public_path('images/'.$filename);
          $location = public_path('/images');
          $img->move($location, $filename);
          $ios->img=$filename;

        $ios->header  =  $request->ios_header;
        $ios->description         =  $request->ios_description;
        $ios->url  =  $request->ios_video;

        $ios->save();
        return redirect()->route('admin.ios');
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
        'ios_header' => 'required',
        'ios_description' => 'required',
        'ios_video' => 'required|url',
        ];
        $messages = [
            'url'  => ' the :attribute  must be a valid URL',
            'required'  => 'the :attribute must be present in the input data and not empty',
            'images'=>'the :attribute must be an image',
            'alpha'=>'the :attribute must be entirely alphabetic characters'
            


        ];

        $data=$this->validate($request,$rules,$messages);


        $ios=Ios::orderBy('updated_at', 'desc')->first();
        $img=$request->img;
        $filename=time().'.'. $img->getClientOriginalExtension();

         // $location=public_path('images/'.$filename);
          $location = public_path('/images');
          $img->move($location, $filename);
          $ios->img=$filename;

        $ios->header  =  $request->ios_header;
        $ios->description         =  $request->ios_description;
        $ios->url  =  $request->ios_video;

        $ios->save();
        return redirect()->route('admin.ios');
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
