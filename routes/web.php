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
//foto route
Route::get('/form',function(){
  return view('form');
});
Route::post('/form', 'AttachmentController@save');
Route::get('/home','HomeController@index');

// Login User Route
Route::get('login/user','OwnerController@login')->name('registration.create');

Route::any('/search','HomeController@homeSearch')->name('homeseach');


// Do login Route
Route::post('login', 'OwnerController@login')->name('post_login');

// Route::get('home', 'OwnerController@index')->name('home');
Route::post('register', 'OwnerController@store')->name('registration.store');

// khabgah_detailes/khabgah_pages route

Route::get('/khabgah_list','HostelController@index');
Route::get('/khabgah_details/{hostel_id}','HostelDetailsController@index')->name('khabgah_detailes.goToDetails');


// Route::resource('user', 'OwnerController');
//
// Route::get('home', function(){
//   return view('home');
// });
// Route::post('login')
// Route::resource('home', 'OwnerController');
// Route::post('registration', 'OwnerController')->name('')
// Route::post('registration', 'OwnerController')->name('registration.create');

// Route::get('login/create','OwnerController@create')->name('post_login');
// Route::post('login','OwnerController@login')->name('post_login');
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('adminUser', function () {
//    return view('adminUser');
//});
//Route::get('/demo', function () {
//
//    return view('demo');
//
//});
//Route::get('/myHome', function () {
//
//    return view('myHome');
//
//});
//Route::get('/home', function () {
//
//    return view('home');
//
//});
//Route::get('/kh_page', function () {
//
//    return view('kh_page');
//
//});
//Route::get('/khabgah_search', function () {
//
//    return view('khabgah_search');
//
//});
//Route::get('/khabgah_details', function () {
//
//    return view('khabgah_details');
//
//});
//Route::get('/khabgah_list', function () {
//
//    return view('khabgha_list');
//
//});
//Route::post('adminUser','hostelOwnerController@store');
//
//
//
//Route::get('my-home', 'HomeController@myHome');
//
//Route::get('my-users', 'HomeController@myUsers');
//
//use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('adminUser', function () {
//    return view('adminUser');
//});
// Route::get('/demo', function () {

//     return view('demo');
// });
//
//Route::get('/myHome', function () {
//
//    return view('myHome');
//
//});
//Route::get('/home', function () {
//
//    return view('home');
//
//});
// Route::get('/kh_page', function () {

//     return view('kh_page');
// });
//
//Route::get('/khabgah_search', function () {
//
//    return view('khabgah_search');
//
//});


//
//Route::get('/khabgah_list', function () {
//
//    return view('khabgha_list');
//
//});
//Route::post('adminUser','hostelOwnerController@store');


//
// Route::get('my-home', 'HomeController@myHome');
//
// Route::get('my-users', 'HomeController@myUsers');
//
