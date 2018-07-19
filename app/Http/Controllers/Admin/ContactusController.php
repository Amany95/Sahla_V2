<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Admin\Contactus;

use App\test;


class ContactusController extends Controller
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
        return view('Admin.admin_pages.contacts');
    }
    public function test()
    {
        return view('Admin.admin_pages.test');
    }

     public function store_test(Request $request)
    {
        //return "success";  

$rules= [
        'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        
        ];
        $messages = [
            'required'  => 'the :attribute must be present in the input data and not empty',
            'images'=>'the :attribute must be an image',
        ];

        $data=$this->validate($request,$rules,$messages);


        $test=new test;

        $file=$request->file;
        $filename=time().'.'. $file->getClientOriginalExtension();

         // $location=public_path('images/'.$filename);
          $location = public_path('/images');
          $file->move($location, $filename);
          $test->address=$filename;

        $test->save();
        return redirect()->route('admin.test');
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;         
       
         
          
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
         $rules = [
            'address'       => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'facebook'      => 'required',
            'twitter'       => 'required',
            'youtube'       => 'required',
            'instagram'     => 'required',
            'description'   => 'required'
                    ];
                  
        $messages = [
            'required'    => 'The :attribute must be present in the input data and not empty',
            'email'       => 'The :attribute must be formatted as an e-mail address.',
            'integer'     => 'The :attribute must be integer',
            'string'      => 'The :attribute must be a string',
            'url'         => 'The :attribute  must be a valid URL.'

                     ];

        $this->validate($request,$rules,$messages);
               
         // $res=Contactus::create($data);
        $contactus=Contactus::orderBy('updated_at','desc')->first();

          $contactus->address=$request->address;
          $contactus->email=$request->email;
          $contactus->phone=$request->phone;
          $contactus->facebook=$request->facebook;
          $contactus->twitter=$request->twitter;
          $contactus->youtube=$request->youtube;
          $contactus->instagram=$request->instagram;
          $contactus->description=$request->description;

          //save data
          $contactus->save();

          return redirect()->route('admin.contact');
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
