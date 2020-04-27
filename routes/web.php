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

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
	Route::resource('/kategori', 'CategoryController')->except(['create', 'show']);
	Route::resource('/produk', 'ProductController');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/role', 'RoleController')->except([
	    'create', 'show', 'edit', 'update'
	]);
	Route::resource('/users', 'UserController')->except(['show']);
	Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
	Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
	Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
	Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
	Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
	Route::resource('/role', 'RoleController')->except(['create', 'show', 'edit', 'update']);
	Route::get('/test/permission/{permission}', function($permission){
		$user = auth()->user()->find(3);
		//$userHasRole = $user->hasRole('kasir');
		$userHasPermission = $user->hasPermissionTo('show products');
	});

	Route::group(['middleware' => ['role:kasir']], function(){
		Route::get('/transaksi', 'OrderController@addOrder')->name('order.transaksi');
	});

	Route::post('/auth/logout', function(){
		Auth::logout();
		return redirect('/login');
	});
});

