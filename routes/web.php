<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/',function(){
    echo 'YASSMINE';
});
Route::get('/Login/create',[LoginController::class,'create']);
Route::get('/inscription/create',[InscriptionController::class,'create'])->name('inscription/create');