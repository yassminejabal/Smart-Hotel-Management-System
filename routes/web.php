<?php

    use App\Http\Controllers\ChambreController;
    use App\Http\Controllers\InscriptionController;
    use App\Http\Controllers\LoginController;
    use App\Http\Middleware\UserMiddleware;
    use App\Models\Chambre;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\ReservationController;

    Route::get('/', function () {
       echo "hello word";
    });

    Route::get('/Login/create', [LoginController::class, 'create'])->name('Login.create');
    Route::post('/Login/store', [LoginController::class, 'store'])->name('Login.store');
    Route::get('/inscription/create', [InscriptionController::class, 'create'])->name('inscription.create');
    Route::post('/inscription/store', [InscriptionController::class, 'store'])->name('inscription.store')->middleware(UserMiddleware::class);
    Route::post('/Login/storre', [LoginController::class, 'store'])->name('login.store');
    Route::get('/dach', [LoginController::class, 'main'])->name('dach');
    Route::get('/inscription/create', [InscriptionController::class, 'create'])->name('inscription.create');
    Route::post('/inscription/store', [InscriptionController::class, 'store'])->name('inscription.store');
    Route::post('/Chambre/store', [ChambreController::class, 'store'])->name('Chambre.store')->middleware(UserMiddleware::class);



    Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index')->middleware(UserMiddleware::class);

    Route::get('/logout', [InscriptionController::class, 'logout'])->name('logout');



    Route::get('/dashboard', [ChambreController::class, 'index'])->name('chambers.index');
    Route::get('/chambers/{id}/edit', [ChambreController::class, 'edit'])->name('chambers.edit');
    Route::put('/chambers/{id}', [ChambreController::class, 'update'])->name('chambers.update');
    Route::delete('/chambers/{id}', [ChambreController::class, 'destroy'])->name('chambers.destroy');


    // clients




    
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    
    Route::get('/clients/{id}/history', [ClientController::class, 'history'])->name('clients.history');
    
    Route::get('/reservations/index', [ReservationController::class, 'index'])->name('reservations.index');

    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');

    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');



