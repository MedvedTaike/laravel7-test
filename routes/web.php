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
Route::redirect('/', '/materials');

Route::resource('/materials', 'MaterialsController');
Route::resource('/tags', 'TagsController');
Route::resource('/categories', 'CategoriesController');
Route::get('/materials/tags/{id}', 'MaterialsController@tags')->name('materials.tags');
Route::put('/materials/addTag/{id}', 'MaterialsController@addTag')->name('materials.addTag');
Route::post('/materials/linksCreate/{id}', 'MaterialsController@linksCreate')->name('materials.linksCreate');
Route::put('/materials/linksEdit/{id}', 'MaterialsController@linksEdit')->name('materials.linksEdit');
Route::delete('/materials/linksDestroy/{id}', 'MaterialsController@linksDestroy')->name('materials.linksDestroy');
Route::put('/materials/removeTag/{id}/{tag_id}', 'MaterialsController@removeTag')->name('materials.removeTag');
