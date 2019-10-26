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
    return view('templates.content');
});

Route::resource('Branch', 'BranchController');
Route::resource('Duration', 'DurationController');
Route::resource('Employee', 'EmployeeController');
<<<<<<< Updated upstream
Route::resource('Item_Category', 'ItemCategoryController');
Route::resource('List_Item', 'ListItemController');

=======
>>>>>>> Stashed changes
Route::resource('Unit_Item', 'UnitItemController');
Route::resource('Spending', 'SpendingController');
Route::resource('Spending_Category', 'SpendingCategoryController');
Route::resource('Role', 'RoleController');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
Route::resource('Login', 'LoginController');

Route::resource('Spending', 'SpendingController');
Route::resource('Spending_Category', 'SpendingCategoryController');

<<<<<<< HEAD

=======
>>>>>>> Stashed changes
=======
Route::get('/Login', 'AuthController@index');
Route::post('/loginPost', 'AuthController@loginPost');
Route::get('/logout', 'AuthController@logout');
>>>>>>> Stashed changes
>>>>>>> master
=======

Route::get('/Login', 'AuthController@index');
Route::post('/loginPost', 'AuthController@loginPost');
Route::get('/logout', 'AuthController@logout');
>>>>>>> Stashed changes
