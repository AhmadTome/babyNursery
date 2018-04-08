<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

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
        //
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
    public function login(){
        $email=Input::get('email');
        $pass=Input::get('password');
        $user=Input::get('login_select');

$users=user::where('email', '=', $email)->where('password', '=', $pass)
    ->where('type', '=', $user)->get();

if(count($users) > 0 && $user=="admin"){
    session(['useremail' => "admin"]);
    return redirect()->to('/addEvent');

}else if(count($users) > 0 && $user=="parent"){
    session(['useremail' => $email]);
   // return  session('useremail');
    return redirect()->to('/ShowEvents');
} else{
    return redirect()->to('/login');
}


    }

    public function logout(Request $request){
        $request->session()->forget('useremail');
        return redirect()->to('/login');
    }
}
