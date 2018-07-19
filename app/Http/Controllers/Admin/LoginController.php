<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class LoginController extends Controller
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
        return view('Admin.admin_pages.login');
    }
    public function c_register()
    {
        return view('Admin.admin_pages.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $rules= [
        'email' => 'required',
        'password' => 'required'
        ];
        $messages = [
            'required'  => 'the :attribute must be present in the input data and not empty',
            'email'=>'the :attribute must be valide email'
        ];
        

        $data=$this->validate($request,$rules,$messages);
        
        $user=new User;
        $user->name='asd';
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        $user->save();
        return " seed";
    }
    public function login(Request $request)
    {
       /* $rules= [
        'email' => 'required',
        'password' => 'required'
        ];
        $messages = [
            'required'  => 'the :attribute must be present in the input data and not empty',
            'email'=>'the :attribute must be valide email'
        ];
        

        $data=$this->validate($request,$rules,$messages);*/
        //$credentials = $request->only('email', 'password');
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
          return redirect()->intended('admin/ios');
        }
        else
        {
            return redirect()->route('admin.login');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->guest(route('admin.register'));
        }
}
