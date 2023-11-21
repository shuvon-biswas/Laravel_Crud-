<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerCrud;



//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/',[ControllerCrud::class,'showData']);
Route::get('/add-data',[ControllerCrud::class,'addData']);
Route::post('/store-data',[ControllerCrud::class,'storeData']);
Route::get('/edit-data/{id}',[ControllerCrud::class,'editData']);
Route::post('/update-data/{id}',[ControllerCrud::class,'updateData']);
Route::get('/delete-data/{id}',[ControllerCrud::class,'deleteData']);
Route::get('/view-data/{id}',[ControllerCrud::class,'viewData']);