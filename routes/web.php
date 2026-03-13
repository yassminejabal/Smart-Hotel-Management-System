<?php

use App\Http\Controllers\ChambreController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\UserMiddleware;
use App\Models\Chambre;
use Illuminate\Support\Facades\Route;



Route::get('/',function(){
    echo 'YASSMINE';
});

Route::get('/Login/create',[LoginController::class,'create'])->name('Login.create');
Route::post('/Login/storre',[LoginController::class,'store'])->name('login.store');
Route::get('/dach',[LoginController::class,'main'])->name('dach');
Route::get('/inscription/create',[InscriptionController::class,'create'])->name('inscription.create');
Route::post('/inscription/store',[InscriptionController::class,'store'])->name('inscription.store');
Route::post('/Chambre/store',[ChambreController::class,'store'])->name('Chambre.store')->middleware(UserMiddleware::class);
// Route::get('',[ChambreController::class,'store'])->name('Chambre.store')->middleware(UserMiddleware::class);


Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index')->middleware(UserMiddleware::class);
// Route::get('/Receptionniste',ChambreController::class);\

Route::get('/logout', [InscriptionController::class, 'logout'])->name('logout');



Route::get('/dashboard', [ChambreController::class, 'index'])->name('chambers.index');
Route::get('/chambers/{id}/edit', [ChambreController::class, 'edit'])->name('chambers.edit');
Route::put('/chambers/{id}', [ChambreController::class, 'update'])->name('chambers.update');
Route::delete('/chambers/{id}', [ChambreController::class, 'destroy'])->name('chambers.destroy');


    