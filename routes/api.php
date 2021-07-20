<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/createLink/{id}', 'Api\MaterialsController@createLink');
Route::post('/searchByName', 'Api\MaterialsController@searchByName');
Route::post('/searchByInput', 'Api\MaterialsController@searchByInput');
Route::put('/updateLink/{id}', 'Api\MaterialsController@updateLink');
