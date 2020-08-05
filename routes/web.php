<?php

use Illuminate\Support\Facades\Route;

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
    return view('/frontend/home.index');
});


Route::get('/admin', function () {
    return view('/admin/user.index');
});
// Route::get('/admin', function () {
//     return redirect('/admin/user.index');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user_propieties', 'admin\PropietiesController@index')->name('user_propieties');

Route::get('publish', 'frontend\PublishController@index')->name('publish');
Route::get('profesional', 'frontend\PublishController@profesional')->name('profesional');
Route::get('personal', 'frontend\PublishController@personal')->name('personal');

Route::resource('loguser', 'frontend\LoguserController');
Route::resource('reset', 'frontend\NewPasswordController');
Route::resource('register', 'frontend\RegisterController');