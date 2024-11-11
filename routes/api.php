<?php

use App\Http\Controllers\memberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAuthController;
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
Route::put('update',[StudentController::class,'updateStudent']);
Route::patch('update/{id}',[StudentController::class,'updateStudent']);

Route::delete('delete/{id}',[StudentController::class,'deleteStudent']);
Route::get('search/{name}',[StudentController::class,'searchStudent']);

Route::resource('member', memberController::class);
Route::post('signup',[UserAuthController::class,'signUp']);
Route::post('login',[UserAuthController::class,'login']);
