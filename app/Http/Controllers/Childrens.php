<?php

namespace App\Http\Controllers;

use App\child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Childrens extends Controller
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

        if ($request->hasFile('ChildImage')) {
            $image = $request->file('ChildImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);


        }


        $user=new child;
        $user->id=Input::get('ChildrenId');
        $user->name=Input::get('ChildrenName');
        $user->gender=Input::get('gender');
        $user->bdate=Input::get('childBirthDay');
        $user->arrivingtime=Input::get('ArravingTime');
        $user->perent_id=Input::get('Parent_select');

        $user->clildimg="/images/".$name;;

        if($user->save()){
            session()->flash("notif","The Child Added Successfully ");
        }else{
            session()->flash("notif","something that be wrong");
        }
        return redirect()->to('/addChildren');

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
    public function edit(Request $request)
    {
        $num = Input::get('Children_select');

        child::where('id', '=', $num)
            ->update(array('id' =>Input::get('ChildrenId') , 'name'=>Input::get('ChildrenName') ,'gender'=>Input::get('genderhidden')
            , 'bdate'=>Input::get('childBirthDay') , 'arrivingtime'=>Input::get('ArravingTime')));
        return redirect()->to('/EditChild');




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
        child::where('id','=',$num)->delete();
    }

    public function getinfo(Request $request){
        $date=child::select('id','name','gender','bdate','arrivingtime')
            ->where('id',$request->childid)->take(1)->get();
        return $date ;
    }
}
