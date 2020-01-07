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
    //owner routes .. 'ramazan'
    route::get('/Owner' , 'OwnerController@index')->name('Owner.index');
    route::get('/Owner/create' , 'OwnerController@create')->name('Owner.create');
    route::post('/Owner/create' , 'OwnerController@store')->name('Owner.store');
//    Route::get('/Owner/delete/{Owner_id}' ,'OwnerController@delete')->name('Owner.delete');
    route::get('/owner/edit/{id?}' , 'OwnerController@edit')->name('owner.edit');
    route::post('/Owner/edit/{Owner_id}' , 'OwnerController@update')->name('Owner.update');
    // route::get('/Owner/send/{Owner_id}' , 'OwnerController@send_to_user_profile')->name('Owner.send');
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
  });
// Route::get('/adminLogin', function () {
//     return view('cms.hostel.login');
// });
Route::post('hostel/photos' ,'AttachmentController@addphotos')->name('add_photos');
//photos delete route "ramazan"
Route::post('hostel/photos/delete' ,'AttachmentController@fileDestroy')->name('fileDestroy');
Route::get('/test', function () {
    return view('cms.hostel.test2');
});
//// Route::get('hostel', 'HostelController@index');
Route::get('/profile', function(){
    return view('cms.hostel.profile');
})->name('profile');
Route::get('/example', function(){
    return view('cms.hostel.example');
})->name('example');


/*
 * Enf of CMS route
 * */


/*
 * =====================================
 * Start of Front Routes
 * =====================================
 * */

//photo route
Route::get('/form',function(){
  return view('front/form');
});
Route::post('/form', 'AttachmentController@save');
Route::get('/','HomeController@index')->name('front.home');
Route::get('/home','HomeController@index');
// Login User Route
Route::get('login/user','OwnerController@login')->name('registration.create');
Route::any('/search','HomeController@homeSearch')->name('homeseach');
// Do login Route
Route::post('login', 'OwnerController@login')->name('post_login');
// Route::get('home', 'OwnerController@index')->name('home');
Route::post('register', 'OwnerController@store')->name('registration.store');
// khabgah_detailes/khabgah_pages route
Route::get('hostel/list','HostelController@listHostel')->name('hostel.list');
// Room Filtering
Route::get('room_filter', function(){
  return view('front/roomFilter_index');
});
// Room Detail
Route::get('room_detail', function(){
    return view('front/roomDetail_index');
});
