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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/viewUser', 'HomeController@index');
Route::get('/user/demo', 'HomeController@view');

Route::resource('user', 'UserController');
Route::get('/user/addUser','UserController@store');
Route::get('/user/viewUser', 'UserController@index');
Route::get('/user/editUser/{id}', 'UserController@edit');





/*Department*/
Route::resource('user_department', 'DepartmentController');
Route::get('/user/addDepartment','DepartmentController@store');
Route::get('/user/viewDepartment','DepartmentController@index');
Route::get('/user/editDepartment/{id}', 'DepartmentController@edit');




/*Designation*/
Route::resource('user_designation', 'DesignationController');
Route::get('/user/addDesignation','DesignationController@store');
Route::get('/user/viewDesignation','DesignationController@index');
Route::get('/user/editDesignation/{id}', 'DesignationController@edit');

/*User Profile*/
Route::resource('userProfile', 'ProfileController');
Route::get('/user/editUserProfile/{id}','ProfileController@edit');
Route::get('/user/viewProfile/{id}','ProfileController@show');



