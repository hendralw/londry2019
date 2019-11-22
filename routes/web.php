<?php

use Illuminate\Http\Request;
use App\Employee;
// use Illuminate\Routing\Route as IlluminateRoute;
// use App\Http\Controllers\CaseInsensitiveUriValidator;
// use Illuminate\Routing\Matching\UriValidator;

// $validators = IlluminateRoute::getValidators();
// $validators[] = new CaseInsensitiveUriValidator;
// IlluminateRoute::$validators = array_filter($validators, function ($validator) {
//     return get_class($validator) != UriValidator::class;
// });
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

// Route::get('/', function () {
//     return view('templates.content');
// });

Route::resource('Branch', 'BranchController');
Route::resource('Duration', 'DurationController');
Route::resource('Employee', 'EmployeeController');
Route::resource('Customer', 'CustomerController');

Route::resource('Item_Category', 'ItemCategoryController');
Route::resource('List_Item', 'ListItemController');

Route::resource('Unit_Item', 'UnitItemController');
Route::resource('Spending', 'SpendingController');
Route::resource('Spending_Category', 'SpendingCategoryController');
Route::resource('Role', 'RoleController');
Route::resource('Transaction', 'TransactionController');
Route::resource('Transaction_Detail', 'TransactionDetailController');

Route::get('/Login', 'AuthController@index');
Route::post('/loginPost', 'AuthController@loginPost');
Route::get('/logout', 'AuthController@logout');


Route::get('/', 'AuthController@home');

Route::post('/Employee/check', 'UniqeCheckController@checkEmployee');
Route::post('/Item_Category/check', 'UniqeCheckController@checkItemCategory');

Route::get('cart', 'TransactionController@cart');

Route::get('add-to-cart/{id}', 'TransactionController@addToCart');

Route::patch('update-cart', 'TransactionController@update');

Route::delete('remove-from-cart', 'TransactionController@remove');