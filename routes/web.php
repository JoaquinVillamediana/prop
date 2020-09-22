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
Route::post('user_profile_edit', 'frontend\ProfileController@edit')->name('user_profile_edit');
Route::post('user_profilepicture_edit', 'frontend\ProfileController@edit_profile_photo')->name('user_profilepicture_edit');


Route::get('user_profile_publications/{user_id}', 'frontend\ProfileController@user_perfil_publicaciones')->name('user_profile_publications');


Route::get('search', 'frontend\SearchController@index')->name('search');
Route::get('/search/compra', 'frontend\SearchController@index_compra')->name('search_compra');
Route::get('/search/alquiler', 'frontend\SearchController@index_alquiler')->name('search_alquiler');
Route::get('search_avanzado', 'frontend\SearchController@index_avanzado')->name('search_avanzado');

// Route::get('mis_propiedades','frontend\')


// messages
Route::get('messages', 'frontend\MessageController@index')->name('messages');
// 

// 
Route::post('send_mail', 'frontend\ContactController@mail')->name('send_mail');
Route::post('send_user_mail/{user_id}', 'frontend\ContactController@users_mail')->name('send_user_mail');
// 

 Route::get('edit_propietie/{id}', 'HomeController@edit_propietie')->name('edit_propietie');
 

Route::get('propietie/{id}', 'frontend\PropertiesController@show')->name('propietie');

Route::middleware(['auth'])->group(function () {

    Route::resource('mis_propiedades', 'frontend\MyPropertiesController');
    Route::get('mis_propiedades/{id}/edit_fotos', 'frontend\MyPropertiesController@edit_photos')->name('my_properties_edit_photos');
    Route::get('my_plans', 'frontend\MyPropertiesController@user_plans')->name('my_plans');

    // Route::post('update_propietie/{id}', 'HomeController@update')->name('update_propietie');
    Route::get('user_profile', 'frontend\ProfileController@index')->name('user_profile');
    Route::post('user_profile_edit', 'frontend\ProfileController@edit')->name('user_profile_edit');
    Route::post('user_profilepicture_edit', 'frontend\ProfileController@edit_profile_photo')->name('user_profilepicture_edit');
    
});

// condiciones del footer
Route::get('terminos_y_condiciones_de_uso', 'frontend\CondicionesController@terminos_y_condiciones_de_uso')->name('terminos_y_condiciones_de_uso');
Route::get('terminos_y_condiciones_de_contrato', 'frontend\CondicionesController@terminos_y_condiciones_de_contratacion')->name('terminos_y_condiciones_de_contrato');
Route::get('politica_de_privacidad', 'frontend\CondicionesController@politica_de_privacidad')->name('politica_de_privacidad');
Route::get('politica_de_gestion_de_calidad', 'frontend\CondicionesController@politica_de_gestion_de_calidad')->name('politica_de_gestion_de_calidad');
Route::get('help', 'frontend\FrecuentesController@ayuda')->name('help');
Route::get('publish_questions', 'frontend\FrecuentesController@publish_questions')->name('publish_questions');
Route::get('frecuent_questions', 'frontend\FrecuentesController@index')->name('frecuent_questions');
// fin de footer


// publicar
// 
// 

// pagar piblicacion o pulblicare sin  login
Route::get('pago/{id}', 'frontend\PublishController@pago')->name('pago'); 

Route::get('pago_completado','frontend\PublishController@pago_completado')->name('pago_completado');

Route::get('publish_publicationtype/{id}', 'frontend\PublishController@propietie_type')->name('publish_publicationtype');



Route::get('publish_propertie_plan/{planxd}', 'frontend\PublishController@publish_propertie')->name('publish_propertie_plan');
Route::post('store_dates', 'frontend\PublishController@store_dates')->name('store_dates');
Route::get('publish_files/{propietie_id}', 'frontend\PublishController@publish_files')->name('publish_files');
Route::post('upload_property_picture', 'frontend\PublishController@store_files')->name('upload_property_picture');
Route::post('upload_property_picture2', 'frontend\PublishController@store_files2')->name('upload_property_picture2');
Route::delete('deleteImage/{id}', 'frontend\PublishController@deleteImage')->name('deleteImage');

Route::get('publish', 'frontend\PublishController@index')->name('publish');
Route::get('publish/profesional', 'frontend\PublishController@profesional')->name('profesional');
Route::get('publish/personal', 'frontend\PublishController@personal')->name('personal');
// 
// 
// fin de pubnlicacion

//contacto
Route::get('contact', 'frontend\ContactController@index')->name('contact');



//
Route::resource('register_users', 'frontend\RuserController');



//rutas de admin
Route::get('users', 'admin\UserController@index')->name('users');
Route::get('propieties', 'admin\PropietiesController@index')->name('propieties');
Route::get('plans', 'admin\PlansController@index')->name('plans');

Route::get('localidades', 'admin\LocalidadesController@index')->name('localidades');
Route::get('favoritos', 'admin\FavoritosController@index')->name('favoritos');

Route::get('operation_type', 'admin\Operation_typeController@index')->name('operation_type');
Route::get('operation_type_create', 'admin\Operation_typeController@create')->name('operation_type_create');
Route::get('operation_type_store', 'admin\Operation_typeController@store')->name('operation_type_store');

Route::get('propieties_type', 'admin\Propieties_typeController@index')->name('propieties_type');
Route::get('propieties_type_create', 'admin\Propieties_typeController@create')->name('propieties_type_create');
Route::get('propieties_type_store', 'admin\Propieties_typeController@store')->name('propieties_type_store');


Route::get('propieties_create', 'admin\PropietiesController@create')->name('propieties_create');

// RUTAS DE PLANES

Route::get('plans', 'admin\PlansController@index')->name('plans');
Route::get('plans_create', 'admin\PlansController@create')->name('plans_create');
Route::get('plans_store', 'admin\PlansController@store')->name('plans_store');
Route::get('plans_edit/{id}', 'admin\PlansController@edit')->name('plans_edit');
Route::get('plans_update', 'admin\PlansController@update')->name('plans_update');
// FIN DE RUTAS DE PLANES


// RUTAS DE AMBIENTES
Route::get('ambients', 'admin\AmbientsController@index')->name('ambients');
Route::get('ambients_create', 'admin\AmbientsController@create')->name('ambients_create');
Route::get('ambients_store', 'admin\AmbientsController@store')->name('ambients_store');
Route::get('ambients_edit/{id}', 'admin\AmbientsController@edit')->name('ambients_edit');
Route::get('ambients_update', 'admin\AmbientsController@update')->name('ambients_update');
// FIN DE RUTAS DE AMBIENTES

// RUTAS DE CARACTERISTICAS GENERALES
Route::get('caracteristicas_gen', 'admin\CargenController@index')->name('caracteristicas_gen');
Route::get('caracteristicas_gen_create', 'admin\CargenController@create')->name('caracteristicas_gen_create');
Route::get('caracteristicas_gen_store', 'admin\CargenController@store')->name('caracteristicas_gen_store');
Route::get('caracteristicas_gen_edit/{id}', 'admin\CargenController@edit')->name('caracteristicas_gen_edit');
Route::get('caracteristicas_gen_update', 'admin\CargenController@update')->name('caracteristicas_gen_update');
// FIN DE RUTAS DE CARACTERISTICAS GENERALES

// Rutas de servicios
Route::get('services', 'admin\ServicesController@index')->name('services');
Route::get('services_create', 'admin\ServicesController@create')->name('services_create');
Route::get('services_store', 'admin\ServicesController@store')->name('services_store');
Route::get('services_edit/{id}', 'admin\ServicesController@edit')->name('services_edit');
Route::get('services_update', 'admin\ServicesController@update')->name('services_update');
// Fin de rutas de servicios

// Rutas moneda
Route::get('moneda', 'admin\MonedaController@index')->name('moneda');
Route::get('moneda_create', 'admin\MonedaController@create')->name('moneda_create');
Route::get('moneda_store', 'admin\MonedaController@store')->name('moneda_store');
Route::get('moneda_edit/{id}', 'admin\MonedaController@edit')->name('moneda_edit');
Route::get('moneda_update', 'admin\MonedaController@update')->name('moneda_update');
//  Fin de rutas moneda

//fin de rutas de admin



Route::resource('loguser', 'frontend\LoguserController');
Route::resource('reset', 'frontend\NewPasswordController');
Route::resource('register', 'frontend\RegisterController');


//AJAX


Route::post('setMainImage', 'frontend\PublishController@setMainImage')->name('setMainImage');
Route::get('getFilterProperties','frontend\SearchController@getFilterProperties')->name('getFilterProperties');
