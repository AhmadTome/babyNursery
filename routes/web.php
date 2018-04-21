<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('logintamplate');
});

/*
Route::get('/', function () {
    $eventcontent=\App\event::all();
    return view('Home')->with('eventcontent',$eventcontent);
});
*/
Route::get('/', function () {

    return view('mainpage.index');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/home', function () {
    $eventcontent=\App\event::all();
    return view('Home')->with('eventcontent',$eventcontent);
});
Route::get('/galary', function () {
    $child=\App\child::all();
    return view('galary')->with('child',$child);
});
Route::get('/about', function () {

    return view('about');
});
Route::group(['middleware' => 'preventBackHistory'],function(){
Route::get('/addEvent', function () {
if(session()->has('useremail')){
    return view('addEvent');
}else{
    return view('logintamplate');
}
});

Route::get('/addChildren', function () {
    $parent=\App\perent::all();
    if(session()->has('useremail')) {
        return view('addChildren')->with('parent', $parent);
    }else{
        return view('logintamplate');
    }
});

Route::get('/addParent', function () {
    if(session()->has('useremail')) {
        return view('addParent');
    }else{
        return view('logintamplate');
    }
});

Route::get('/sendMessage', function () {
    $parent=\App\perent::all();
    if(session()->has('useremail')) {
        return view('SendMessage')->with('parent', $parent);
    }else{
        return view('logintamplate');
    }
});

Route::get('/AddInfo', function () {
    if(session()->has('useremail')) {
        return view('addinfo');
    }else{
        return view('logintamplate');
    }
});

Route::get('/EditInfo', function () {
    $info=\App\admin::all();
    if(session()->has('useremail')) {
        return view('EditInfo')->with('info', $info);
    }else{
        return view('logintamplate');
    }
});

Route::get('/ChildInfo', function () {
    $email=session('useremail');

    $specficParent=\App\perent::select('Id','name')
        ->where('email',$email)->take(1)->get();

    $specficchild=\App\child::select('id','name','gender','bdate','arrivingtime','clildimg')
        ->where('perent_id',$specficParent[0]->Id)->take(1000)->get();
if(count($specficchild) > 0)
    return view('Parent.childinfo')->with('specficchild',$specficchild)->with('parentname',$specficParent[0]->name);
else
    return "This Parent not have a child registered before";
});

Route::get('/ParentInfo', function () {

$email=session('useremail');

    $specficParent=\App\perent::select('Id','email','name','age','phone','address')
        ->where('email',$email)->take(1)->get();
    if(session()->has('useremail')) {
        return view('Parent.ParentInfo')->with('specficParent', $specficParent);
    }else{
        return view('logintamplate');
    }
});

Route::get('/ShowEvents', function () {
    $enentcontent=\App\event::all();
    if(session()->has('useremail')) {
        return view('Parent.ShowEvents')->with('enentcontent', $enentcontent);
    }else{
        return view('logintamplate');
    }
});
Route::get('/SelectedEvents', function () {
    $email=session('useremail');
    $specficParent=\App\perent::select('Id')
        ->where('email',$email)->take(1)->get();
    $parentid=$specficParent[0]->Id;

    $selectedenevt=\Illuminate\Support\Facades\DB::select("select * from events where ID in (select distinct eventid from eventregistered where parentid=$parentid)");
    if(session()->has('useremail')) {
        return view('Parent.selectedEvent')->with('selectedenevt', $selectedenevt);
    }else{
        return view('logintamplate');
    }
});
    Route::get('/EditParent', function () {
        $parent=\App\perent::all();
        if(count($parent) == 0){
            return "you have No Parent ";
        }
        else if(session()->has('useremail')) {
            return view('EditParent')->with('parent',$parent);
        }else{
            return view('logintamplate');
        }
    });

    Route::get('/EditChild', function () {
        $child=\App\child::all();
        $parent=\App\perent::all();
        if(count($child) == 0){
            return "you have No child ";
        }
        else if(session()->has('useremail')) {
            return view('EditChild')->with('child',$child)->with('parent',$parent);
        }else{
            return view('logintamplate');
        }
    });


// Actions

Route::post('login','LoginController@login');
Route::post('SaveParent','perents@store');
Route::post('SaveChildren','Childrens@store');
Route::post('Saveadmin','adminController@store');
Route::post('EditInformation','adminController@edit');
Route::post('SaveEvent','EventController@store');
Route::post('EditParentInfo','perents@edit');
Route::post('EditChildren','Childrens@edit');



Route::get('/enrollment','EventController@enroll');
Route::get('/selectregiteredEvent','EventController@selectregisteredEvent');
Route::get('/parentname','perents@getname');
Route::get('/adminname','adminController@getname');
Route::get('/logout','LoginController@logout');
Route::get('/getParentInfo','perents@getinfo');
Route::get('/deleteParent','perents@destroy');
Route::get('/getchildInfo','Childrens@getinfo');
Route::get('/deletechild','Childrens@destroy');

Route::get('/getchild','Childrens@getchild');



Route::post('/sendmail', function (\Illuminate\Http\Request $request,\Illuminate\Mail\Mailer $mailer) {
    if($request->input('mail')=="all")
    {
        $parent=\App\perent::all();
        foreach ($parent as $item)
        {
            $mailer->to($item->email)->send(new \App\Mail\MyMail($request->input('title'), $request->input('subject')));

        }
        return redirect()->back();

    }

     else {
         $mailer->to($request->input('mail'))->send(new \App\Mail\MyMail($request->input('title'), $request->input('subject')));
     }
    return redirect()->back();
})->name('sendmail');

});

Route::get('/contact.html', function () {
  return view('logintamplate');
});


Route::get('/navtest', function () {
    return view('navtest');
});



// home test

Route::get('/index.html', function () {
    return view('mainpage.index');
});
Route::get('/about.html', function () {
    return view('mainpage.about');
});

Route::get('/gallery.html', function () {
    return view('mainpage.gallery');
});

Route::get('/Event.html', function () {
    $eventcontent=\App\event::all();
    return view('mainpage.home_event')->with('eventcontent',$eventcontent);
});