<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Client;
use App\Notifications\TestMsg;
use App\User;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=Client::all();
        $client_num=Client::count();
        return view('Admin.admin_pages.online-Clients',['client' => $client,'client_num'=>$client_num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_num=Client::count();
        return view('Admin.admin_pages.add-client',['client_num' => $client_num]);
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
        'client_name' => 'required',
        'description' => 'required|max:255',
        ];
        $messages = [
            'max'  => ' the :attribute must be less than or equal to 225 value',
            'required'  => 'the :attribute must be present in the input data and not empty',
            


        ];

        $data=$this->validate($request,$rules,$messages);


        $client=new Client;
        $client->name         =  $request->client_name;
        $client->description  =  $request->description;

        $client->save();

        $user = User::first();

        $user->notify(new TestMsg("A new user has visited on your application."));

        

        return redirect()->route('clients.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $client=Client::find($id);
         return view('Admin.admin_pages.edit-client',['client'=>$client]);
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
        $rules= [
        'edit_name' => 'required',
        'edit_descrip' => 'required|max:255',
        ];
        $messages = [
            'max'  => ' the :attribute must be less than or equal to 225 value',
            'required'  => 'the :attribute must be present in the input data and not empty',
            


        ];

        $data=$this->validate($request,$rules,$messages);


        $client=Client::find($id);
        $client->name         =  $request->edit_name;
        $client->description  =  $request->edit_descrip;

        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id);

        $client->delete();
        return redirect()->route('clients.index');

    }
}
