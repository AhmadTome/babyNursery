<?php

namespace App\Http\Controllers;

use App\event;
use App\eventregistered;
use App\perent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
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


        if ($request->hasFile('EventImage')) {
            $image = $request->file('EventImage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);


        }


       $user=new event;
       $user->ID=Input::get('EventId');
        $user->event_name=Input::get('Eventname');
        $user->date=Input::get('Eventdate');
        $user->location=Input::get('Eventlocation');
        $user->description=Input::get('EventDescription');
        $user->img_path="/images/".$name;
        if($user->save()){
            session()->flash("notif","Even Added Successfully ");
        }else{
            session()->flash("notif","Some thing that be wrong !");

        }
        return redirect()->to('/addEvent');


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


    public function enroll(Request $request){

    $eventid=$request->eventid;

    $parentemail=session('useremail');
    $parentidquery=perent::select('Id')
        ->where('email',$parentemail)->take(1)->get();
    $parentid=$parentidquery[0]->Id;


    $eventseleted = eventregistered::select('id')
    ->where('eventid',$eventid)->where('parentid',$parentid)->take(1000)->get();


    if(count($eventseleted) > 0){
        eventregistered::where('eventid','=',$eventid)->where('parentid','=',$parentid)
            ->delete();
    }
    else {
        $user = new eventregistered;
        $user->eventid = $eventid;
        $user->parentid = $parentid;
        $user->save();
    }
    }

    public function selectregisteredEvent(Request $request){

        $parentemail=session('useremail');
        $parentidquery=perent::select('Id')
            ->where('email',$parentemail)->take(1)->get();
        $parentid=$parentidquery[0]->Id;

        $data = eventregistered::select('eventid')
            ->where('parentid',$parentid)->take(1000)->get();
        return $data;
    }
}
