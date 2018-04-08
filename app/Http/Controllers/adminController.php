<?php

namespace App\Http\Controllers;

use App\admin;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class adminController extends Controller
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
        $user=new admin;
        $user->name=Input::get('AdminName');
        $user->address=Input::get('AdminAddress');
        $user->phone_number=Input::get('Adminphone');

        $user2=new user;
        $user2->email=Input::get('AdminEmail');
        $user2->password=Input::get('AdminPassword');
        $user2->type="admin";


        if($user->save() && $user2->save()){
            session()->flash("notif","The admin Added Successfully ");
        }else{
            session()->flash("notif","something that be wrong");
        }



        return redirect()->to('/AddInfo');
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
    public function edit()
    {


admin::truncate();

        $user=new admin;
        $user->name=Input::get('AdminName');
        $user->address=Input::get('AdminAddress');
        $user->phone_number=Input::get('Adminphone');
        if($user->save() ){
            session()->flash("notif","The admin Info Edited Successfully ");
        }else{
            session()->flash("notif","something that be wrong");
        }
        return redirect()->to('/EditInfo');
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
    public function getname(Request $request){
        $adminquery=admin::select('name')
            ->take(1)->get();

        return $adminquery[0]->name;
    }
}
