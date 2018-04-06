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
    return view('login');
});

Route::get('/', function () {
    return view('admin_MainPage');
});

Route::get('/addEvent', function () {
    return view('addEvent');
});

Route::get('/addChildren', function () {
    $parent=\App\perent::all();
    return view('addChildren')->with('parent',$parent);
});

Route::get('/addParent', function () {
    return view('addParent');
});

Route::get('/sendMessage', function () {
    $parent=\App\perent::all();
    return view('SendMessage')->with('parent',$parent);
});

Route::get('/AddInfo', function () {
    return view('addinfo');
});

Route::get('/EditInfo', function () {
    $info=\App\admin::all();
    return view('EditInfo')->with('info',$info);
});

Route::get('/ChildInfo', function () {
    return view('Parent.childinfo');
});

Route::get('/ParentInfo', function () {
    return view('Parent.ParentInfo');
});

Route::get('/ShowEvents', function () {
    $enentcontent=\App\event::all();
    return view('Parent.ShowEvents')->with('enentcontent',$enentcontent);
});

// Actions

Route::post('login','LoginController@login');
Route::post('SaveParent','perents@store');
Route::post('SaveChildren','Childrens@store');
Route::post('Saveadmin','adminController@store');
Route::post('EditInformation','adminController@edit');
Route::post('SaveEvent','EventController@store');


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

