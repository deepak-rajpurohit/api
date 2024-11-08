<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/test",function(){
    return ["name"=>"Deepak", "email"=>"deepak@email.com", "phone"=>"998877"];
});

Route::get('list',[StudentController::class,'list']);
Route::post('add',[StudentController::class,'addStudent']);
