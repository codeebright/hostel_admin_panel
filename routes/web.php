<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
 * =========================================
 * Start of CMS route
 *
 * =========================================
 * */
route::group(['prefix' => 'admin'] , function()
{
    route::get('/hostel_list' , 'HostelController@hostels_list')->name('hostels_list');
    route::get('/hostel/' , 'HostelController@index')->name('hostel.index');
    route::get('/hostel/create/' , 'HostelController@create')->name('hostel.create');
    route::post('/hostel/create/' , 'HostelController@store')->name('hostel.store');
    route::get('/hostel/show/{hostel_id?}' , 'HostelController@show')->name('hostel.show');
    Route::get('/hostel/delete/{hostel_id}' ,'HostelController@delete')->name('hostel.delete');
    route::get('/hostel/edit/{hostel_id}' , 'HostelController@edit')->name('hostel.edit');
    route::post('/hostel/edit/{hostel_id}' , 'HostelController@update')->name('hostel.update');;

// rooms route
//    route::get('/room' , 'HostelController@index')->name('hostel.index');
    route::get('/room/create' , 'RoomController@create')->name('room.create');
    route::post('/room/create' , 'RoomController@store')->name('room.store');
    route::get('/room/{id}/delete' , 'RoomController@delete')->name('room.delete');
    route::get('/room/edit/{id}' , 'RoomController@edit')->name('room.edit');
    route::post('/room/edit/{id}' , 'RoomController@update')->name('room.update');
    //User routes .. 'ramazan'
    route::get('/User' , 'UserController@index')->name('User.index');
    route::get('/User/create' , 'UserController@create')->name('User.create');
    route::post('/User/create' , 'UserController@store')->name('User.store');
//    Route::get('/User/delete/{User_id}' ,'UserController@delete')->name('User.delete');
    route::get('/User/edit/{id?}' , 'UserController@edit')->name('User.edit');
    route::post('/User/edit/{User_id}' , 'UserController@update')->name('User.update');
    route::get('/User/send/{User_id}' , 'UserController@send_to_user_profile')->name('User.send');
    //Food Resource route 'Ramazan'
    Route::resource('food','FoodController')->except('update');
    Route::post('food/update','FoodController@update')->name('food.update');
    /** Attachments */
    Route::post('attachment/destroy','AttachmentController@destoryAttachment')->name('attachment.destroy');
    Route::post('attachment/update','AttachmentController@editAttachment')->name('attachment.edit');
    Route::post('attachment/create','AttachmentController@createAttachment')->name('attachment.create');
    Route::get('/DownloadAttachments/{id},{table}', 'AttachmentController@DownloadAttachments')->name('DownloadAttachments');
    Route::post('/bringMoreAttachments', 'AttachmentController@bringMoreAttachments')->name('bringMoreAttachments');
    Route::get('/attachments_list/{id},{table}', 'AttachmentController@attachments_list')->name('attachments_list');
    Route::post('/store_attachments', 'AttachmentController@store_attachments')->name('store_attachments');
    Route::post('/attachment/load', 'AttachmentController@loadAttachments')->name('attachment.load');

});

Route::get('syncfacility','HostelController@syncfacility')->name('syncfacility');

Route::get('/adminLogin', function () {
    return view('cms.hostel.login');
});

//hostel list page route tem

// Hostel Resource route Ramazan
//Route::resource('hostel','HostelController');
//dropdown routes create 'ramazan'
Route::post('hostel/photos' ,'AttachmentController@addphotos')->name('add_photos');
//photos delete route "ramazan"
Route::post('hostel/photos/delete' ,'AttachmentController@fileDestroy')->name('fileDestroy');
//delet the room  ... 'ramazan'
//Route::get('rooms/delete/{room_id}' ,'RoomController@delete')->name('room.delete');
 //Room resource route 'Ramazan'
//Route::resource('room','RoomController');



Route::get('/test', function () {
    return view('cms.hostel.test2');
});
/*
 * =====================================
 * end of cms routes
 * =====================================
 * */

/*
 * =====================================
 * Start of Front Routes
 * =====================================
 * */
Route::get('/home', 'HomeController@fontIndex')->name('home_index');
Route::any('hostel_list/{page?}','HostelController@listHostel')->name('hostel.list');
Route::get('hostel_details/{hostel_id}', 'HostelDetailsController@details')->name('hostel_details');
//search && filter
Route::post('search', 'HomeController@homeSearch')->name('home_search');
Route::get('room_filter','HomeController@roomFilter')->name('room_filter');
Route::get('room_details/{file_id}','HostelDetailsController@roomDetails')->name('room_details');//packages Route
// customer routes
// Route::get('/Customer', 'CustomerController@index')->name('Customer.index');
   // Route::get('Customer/create', 'CustomerController@create')->name('Customer.create');
Route::post('/Customer/store/{room_id?}', 'CustomerController@store')->name('Customer.store');



/*
* =====================================
* Start of Front Routes
* =====================================
* */

//Login
Route::get('/','HomeController@index')->name('hom');
Route::get('/hom','HomeController@index')->name('hom');
// Login User Route
Route::get('front/user','UserController@login')->name('registration.create');
//login route
Auth::routes();
//Route::get('/home', 'HomeController@frontIndex')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('/home' ,'HomeController@frontIndex');
//Notification
Route::get('/notify', function (){
$Customer = \App\Client::first();
return view('front.form.notification', compact("Customer"));
});
Route::get('/x', function (){
    $Customer = \App\Client::first();
    Notification::send($Customer, new \App\Notifications\Like($Customer));
    foreach ($Customer->unreadNotifications as $notification) {
        $notification->markAsRead();
    }
});
