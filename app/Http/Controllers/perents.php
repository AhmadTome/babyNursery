<?php

namespace App\Http\Controllers;

use App\perent;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class perents extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new perent;
        $user->Id=Input::get('ParentId');
        $user->email=Input::get('Parentemail');
        $user->password=Input::get('Parentpassword');
        $user->name=Input::get('ParentName');
        $user->age=Input::get('Parentage');
        $user->phone=Input::get('Parentphone');
        $user->address=Input::get('Parentaddress');

        if($user->save()){
            session()->flash("notif","The Parent Added Successfully ");
        }else{
            session()->flash("notif","something that be wrong");
        }
        $user2=new user;
        $user2->email=Input::get('Parentemail');
        $user2->password=Input::get('Parentpassword');
        $user2->type="parent";
        $user2->save();

        return redirect()->to('/addParent');
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
    public function update(Request $request, $id)
    {
        //
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