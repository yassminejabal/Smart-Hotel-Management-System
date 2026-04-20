<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChambreController;
use App\Http\Middleware\UserMiddleware;
use App\Models\Chambre;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactureController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\ReceptionnisteMiddleware;
Route::get('/', function () {
    return view("Lendinpages");
});


Route::get('/Login/create', [AuthController::class, 'logincreate'])->name('Login.create');
Route::post('/Login/store', [AuthController::class, 'Loginstore'])->name('Login.store');
Route::get('/inscription/create', [AuthController::class, 'createinscription'])->name('inscription.create');
Route::post('/inscription/store', [AuthController::class, 'storeinscreption'])->name('inscription.store');
Route::get('/dachbord', [AuthController::class, 'main'])->name('dach');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::patch('/users/{id}/toogleban',[AuthController::class, 'toogleban'])->name('users.toogleban');


Route::get('/reseptionneste-dashboard',[DashboardController::class,'reseptionneste'])->name('reseptionneste.dashboard');


Route::get('/admin-dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard')->middleware(AdminMiddleware::class);
Route::get('/client-dashboard', [DashboardController::class, 'client'])->name('client.dashboard')->middleware(ClientMiddleware::class);
Route::post('/Chambre/store', [ChambreController::class, 'store'])->name('Chambre.store')->middleware(ReceptionnisteMiddleware::class);
Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index')->middleware(ReceptionnisteMiddleware::class);
Route::get('/dashboard', [ChambreController::class, 'index'])->name('chambers.index')->middleware(ReceptionnisteMiddleware::class);
Route::get('/chambers/{id}/edit', [ChambreController::class, 'edit'])->name('chambers.edit')->middleware(ReceptionnisteMiddleware::class);
Route::put('/chambers/{id}', [ChambreController::class, 'update'])->name('chambers.update')->middleware(ReceptionnisteMiddleware::class);   
Route::delete('/chambers/{id}', [ChambreController::class, 'destroy'])->name('chambers.destroy')->middleware(ReceptionnisteMiddleware::class);

















Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware(ReceptionnisteMiddleware::class);
Route::get('/clients/index', [ClientController::class, 'index'])->name('clients.index')->middleware(ReceptionnisteMiddleware::class);
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store')->middleware(ReceptionnisteMiddleware::class);
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware(ReceptionnisteMiddleware::class);
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update')->middleware(ReceptionnisteMiddleware::class);
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware(ReceptionnisteMiddleware::class);
Route::get('/clients/{id}/history', [ClientController::class, 'history'])->name('client.historique')->middleware(ReceptionnisteMiddleware::class);














Route::get('/reservations/index', [ReservationController::class, 'index'])->name('reservations.index')->middleware(ReceptionnisteMiddleware::class);
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create')->middleware(ReceptionnisteMiddleware::class);
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store')->middleware(ReceptionnisteMiddleware::class);
Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit')->middleware(ReceptionnisteMiddleware::class);
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update')->middleware(ReceptionnisteMiddleware::class);
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy')->middleware(ReceptionnisteMiddleware::class);
Route::patch('/reservations/{id}/status', [ReservationController::class, 'updateStatuspaiment'])->name('reservations.updateStatuspaiment')->middleware(ReceptionnisteMiddleware::class);
Route::patch('/reservations/{id}/payment-status', [ReservationController::class, 'updatePaymentStatusReservationConfirmation'])->name('reservations.updatePaymentStatusReservationConfirmation')->middleware(ReceptionnisteMiddleware::class);
Route::get('/reservations/{id}/paiement', [ReservationController::class, 'showPaiement'])->name('reservations.paiement');
Route::post('/facture/{id}/pdf', [FactureController::class, 'telechargerFacture'])->name('facture.pdf')->middleware(ReceptionnisteMiddleware::class);









Route::get('/clients/{id}/send-email', [ClientController::class, 'sendEmail'])->name('clients.sendEmail');

