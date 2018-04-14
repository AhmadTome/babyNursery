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

        $this->validate($request,[
            'Parentemail' => 'required|unique:perents,email'
        ]);

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
    public function edit(Request $request)
    {
        $num = Input::get('Parent_select');
        $parentquery=perent::select('email')->where('Id',$num)->take(1)->get();
        $email=$parentquery[0]->email;

        perent::where('Id','=',$num)->delete();
        user::where('email','=',$email)->delete();


        $user=new perent;
        $user->Id=Input::get('ParentId');
        $user->email=Input::get('Parentemail');
        $user->password=Input::get('Parentpassword');
        $user->name=Input::get('ParentName');
        $user->age=Input::get('Parentage');
        $user->phone=Input::get('Parentphone');
        $user->address=Input::get('Parentaddress');
        if($user->save()){
            session()->flash("notif","The Parent Info Edited Successfully ");
        }else{
            session()->flash("notif","something that be wrong");
        }
        $user2=new user;
        $user2->email=Input::get('Parentemail');
        $user2->password=Input::get('Parentpassword');
        $user2->type="parent";
        $user2->save();
        return redirect()->to('/EditParent');
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
    public function destroy(Request $request)
    {
        $num = $request->id;
        $parentquery=perent::select('email')->where('Id',$num)->take(1)->get();
        $email=$parentquery[0]->email;
        user::where('email','=',$email)->delete();
        perent::where('Id','=',$num)->delete();
    }
    public function getname(Request $request){
        $parentemail=session('useremail');
        $parentidquery=perent::select('name')
            ->where('email',$parentemail)->take(1)->get();
        $parentname=$parentidquery[0]->name;
        return $parentname;
    }

    public function getinfo(Request $request){
        $date=perent::select('email','password','name','age','phone','address','Id')
            ->where('Id',$request->parentid)->take(1)->get();
        return $date ;
    }
}
