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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');




Route::get('/admin', function () {
    return view('layouts.admin_master');
});

Route::get('form', function () {
    return view('example.form');
});
//Route::get('table', function () {
//    return view('example.table');
//});
Route::get('table_two', function () {
    return view('example.form_two');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();




//facebook login
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
// Linkdin login
Route::get('auth/linkedin', 'Auth\LoginController@redirectToLinkedin');
Route::get('auth/linkedin/callback', 'Auth\LoginController@handleLinkedinCallback');






Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('layouts.admin');
    });

    Route::get('/home', 'HomeController@index');

    Route::resource('users','UserController');

     //clear cache from route, view, config and all cache data from application
    Route::get('cachClear', function () {
     /* Reoptimized class loader : php artisan optimize */
    \Artisan::call('optimize');
     /* Clear Cache facade value : php artisan cache:clear */
    \Artisan::call('cache:clear');
     /* Clear Route cache : php artisan route:clear */
    \Artisan::call('route:clear');
     /* Clear View cache :php artisan view:clear */
    \Artisan::call('view:clear');
     /* Clear Config cache : php artisan config:clear */
    \Artisan::call('config:clear');
    return Redirect::back();
    });

    //user role create,edit,delete,show
    Route::resource('roles','Admin\RoleController',['middleware'=>['auth']]);
    Route::resource('roleAssigns','Admin\RoleAssiginController',['middleware'=>['auth']]);
    Route::resource('permissions','Admin\PermissionController',['middleware'=>['auth']]);
    Route::resource('permissionAssigns','Admin\PermissionAssiginController',['middleware'=>['auth']]);




//    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
//    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
//    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
//    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
//    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
//    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
//    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

    Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
    Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
    Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
    Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
    Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
    Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);
});