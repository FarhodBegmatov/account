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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('searchItem', 'HomeController@search')->name('search_item');

Route::namespace('Admin')->prefix('admin/')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users', 'UserController', ['except' => ['create', 'store', 'show']]);
    Route::resource('finance', 'FinanceController');
    Route::resource('categories', 'CategoryController');
    Route::get('income', 'IncomeController@index')->name('income');
    Route::get('consumption', 'ConsumptionController@index')->name('consumption');
    Route::get('search', 'CategoryController@search')->name('search');
    Route::get('searchContent', 'FinanceController@search')->name('search_content');
    Route::get('searchUser', 'UserController@search')->name('search_user');
    Route::get('searchIncome', 'IncomeController@search')->name('search_income');
    Route::get('searchConsumption', 'ConsumptionController@search')->name('search_consumption');
});
