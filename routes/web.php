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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', 'adminController@admin');
Route::get('/inputadmin', 'adminController@getInput');
Route::post('/inputadmin', 'adminController@simpanadmin');
Route::get('/editadmin/{id}', 'adminController@getEdit');
Route::post('/editadmin/{id}', 'adminController@ubahadmin');
Route::get('/hapusadmin/{id}', 'adminController@getDelete');
 
Route::get('password/change', 'Auth\AuthController@changePassword');
 Route::post('password/change', 'Auth\AuthController@postChangePassword');



Route::group(['middleware' => ['web', 'auth',]], function() {
  Route::resource('post','PostController');
  Route::POST('addPost','PostController@addPost');
  Route::POST('editPost','PostController@editPost');
  Route::POST('deletePost','PostController@deletePost');

Route::get('/skpd', 'skpdController@skpd');
Route::get('/aplikasi', 'aplikasiController@aplikasi');
Route::get('/aplikasi/cari','aplikasiController@cari');

Route::get('/editaplikasi/{id}', 'aplikasiController@getEdit');
Route::post('/editaplikasi/{id}', 'aplikasiController@ubahaplikasi');

Route::get('/editstatus/{id}', 'requestController@getstatus');
Route::post('/editstatus/{id}', 'requestController@ubahstatus');

Route::get('/dashboard', 'dashboardController@dashboard');


  Route::get('/request', 'requestController@request');
  Route::get('/inputrequest', 'requestController@getInput');
  Route::post('/inputrequest', 'requestController@simpanrequest');
  Route::get('/inputaplikasi', 'inputController@getInput');
  Route::post('/inputaplikasi', 'inputController@simpanrequest');
  Route::get('/editrequest/{id}', 'requestController@getEdit');
  Route::post('/editrequest/{id}', 'requestController@ubahrequest');
  Route::get('/editprogress/{id}', 'requestController@getProgress');
  Route::post('/editprogress/{id}', 'requestController@ubahprogress');
  Route::get('/proses/{id}', 'requestController@proses');
  Route::get('/comment/{id}', 'requestController@getcomment');
  Route::post('/comment/{id}', 'requestController@comment');

  Route::get('/contacts', 'chatController@get');
  Route::get('/conversation/{id}', 'chatController@getMessagesFor');
  Route::post('/conversation/send', 'chatController@send');
  Route::get('/chat', 'chatController@chat');

  Route::get('/getupdate', 'chatController@getupdate');

  
  Route::get('/chats', 'chatsController@chats');


  Route::get('/hapusrequest/{id}', 'requestController@getDelete');
  Route::get('/cancel/{id}', 'requestController@getcancel');
  Route::get('/reqhapus/{id}', 'requestController@reqhapus');

  Route::get('/progress', 'progressController@progress');

  Route::get('/detail/{id}', 'detailController@detail');


  Route::get('/requesta', 'requestaController@requesta');
  Route::get('/requesta/cari','requestaController@cari');
  Route::get('/inputrequesta', 'requestaController@getInput');
  Route::post('/inputrequesta', 'requestaController@simpanrequest');
  Route::get('/editrequesta/{id}', 'requestaController@getEdit');
  Route::post('/editrequesta/{id}', 'requestaController@ubahrequesta');
  Route::get('/hapusrequesta/{id}', 'requestaController@getDelete');

    Route::get('/profile', 'profileController@profile');
  Route::get('/inputprofile', 'profileController@getInput');
  Route::post('/inputprofile', 'profileController@simpanprofile');
  Route::get('/editprofile/{id}', 'profileController@getEdit');
  Route::post('/editprofile/{id}', 'profileController@ubahprofile');
  Route::get('/hapusprofile/{id}', 'profileController@getDelete');
  
  Route::get('/proskpd', 'proskpdController@proskpd');

  Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
  });


  Route::post('/admin', 'adminController@admin');
  Route::get('/admin/cari','adminController@cari');


});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
