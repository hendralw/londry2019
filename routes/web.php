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
Route::resource('Item_Category', 'ItemCategoryController');
Route::resource('List_Item', 'ListItemController');

Route::resource('Unit_Item', 'UnitItemController');
Route::resource('Spending', 'SpendingController');
Route::resource('Spending_Category', 'SpendingCategoryController');
Route::resource('Role', 'RoleController');
Route::resource('Login', 'LoginController');

Route::resource('Spending', 'SpendingController');
Route::resource('Spending_Category', 'SpendingCategoryController');


