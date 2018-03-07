<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('allCat/{id}', 'categoryController@showbycategory');
Route::get('allItem/{id}', 'itemController@showbyitem');

Route::get('category', 'categoryController@view');
Route::post('addCategory', 'categoryController@add');
Route::put('updateCategory', 'categoryController@update');
Route::delete('deleteCategory', 'categoryController@delete');

Route::get('item', 'itemController@view');
Route::post('addItem', 'itemController@add');
Route::put('updateItem', 'itemController@update');
Route::delete('deleteItem', 'itemController@delete');
