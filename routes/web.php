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


Route::get('/', 'HomeController@index');

Route::get('/admin', function () {
    return view('/admin/user.index');
});
// Route::get('/admin', function () {
//     return redirect('/admin/user.index');
// });


Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('user_profile', 'frontend\ProfileController@index')->name('user_profile');
Route::get('user_profile_publications/{user_id}', 'frontend\ProfileController@user_perfil_publicaciones')->name('user_profile_publications');
Route::get('user_propieties', 'frontend\PropietiesController@index')->name('user_propieties');

Route::get('search', 'frontend\SearchController@index')->name('search');
Route::get('search_compra', 'frontend\SearchController@index_compra')->name('search_compra');
Route::get('search_alquiler', 'frontend\SearchController@index_alquiler')->name('search_alquiler');
Route::get('search_avanzado', 'frontend\SearchController@index_avanzado')->name('search_avanzado');
// messages
Route::get('messages', 'frontend\MessageController@index')->name('messages');
// 

Route::get('propietie/{id}', 'HomeController@propietie')->name('propietie');

Route::get('publish', 'frontend\PublishController@index')->name('publish');
Route::get('profesional', 'frontend\PublishController@profesional')->name('profesional');
Route::get('personal', 'frontend\PublishController@personal')->name('personal');

// publicacion de una propiedad con login hecho

Route::get('publish_publicationtype/{id}', 'frontend\PublishController@propietie_type')->name('publish_publicationtype');


Route::get('publish_personal_free/{id}', 'frontend\PublishController@publish_login1')->name('publish_personal_free');
Route::post('store1', 'frontend\PublishController@store1')->name('store1');

Route::get('publish_personal_free2', 'frontend\PublishController@publish_login2')->name('publish_personal_free2');
Route::get('publish_personal_free3', 'frontend\PublishController@publish_login3')->name('publish_personal_free3');
Route::get('publish_personal_free4', 'frontend\PublishController@publish_login4')->name('publish_personal_free4');

// fin de pubnlicacion con lgoin

//contacto
Route::get('contact', 'frontend\ContactController@index')->name('contact');

// pagar piblicacion o pulblicare sin  login
Route::get('pago/{id}', 'frontend\PublishController@pago')->name('pago');
// 

// cobro 
Route::get('cobro', 'frontend\PublishController@cobro')->name('cobro');
// 

//
Route::get('register_users', 'frontend\RuserController@index')->name('register_users');

//rutas de admin
Route::get('users', 'admin\UserController@index')->name('users');
Route::get('propieties', 'admin\PropietiesController@index')->name('propieties');
Route::get('plans', 'admin\PlansController@index')->name('plans');


Route::get('operation_type', 'admin\Operation_typeController@index')->name('operation_type');
Route::get('operation_type_create', 'admin\Operation_typeController@create')->name('operation_type_create');
Route::get('operation_type_store', 'admin\Operation_typeController@store')->name('operation_type_store');

Route::get('propieties_type', 'admin\Propieties_typeController@index')->name('propieties_type');
Route::get('propieties_type_create', 'admin\Propieties_typeController@create')->name('propieties_type_create');
Route::get('propieties_type_store', 'admin\Propieties_typeController@store')->name('propieties_type_store');


Route::get('propieties_create', 'admin\PropietiesController@create')->name('propieties_create');


//fin de rutas de admin



Route::resource('loguser', 'frontend\LoguserController');
Route::resource('reset', 'frontend\NewPasswordController');
Route::resource('register', 'frontend\RegisterController');