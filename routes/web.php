<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChambreController;
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
    
        route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/admin-dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard')->middleware(AdminMiddleware::class);
        Route::patch('/users/{id}/toogleban', [AuthController::class, 'toogleban'])->name('users.toogleban');
        });


        route::middleware([ReceptionnisteMiddleware::class])->group(function () {
        Route::get('/reseptionneste-dashboard', [DashboardController::class, 'reseptionneste'])->name('reseptionneste.dashboard');
        Route::resource('chambres', ChambreController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
        Route::get('/clients/{id}/history', [ClientController::class, 'history'])->name('client.historique');
        Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::patch('/reservations/{id}/status', [ReservationController::class, 'updateStatuspaiment'])->name('reservations.updateStatuspaiment');
        Route::patch('/reservations/{id}/payment-status', [ReservationController::class, 'updatePaymentStatusReservationConfirmation'])->name('reservations.updatePaymentStatusReservationConfirmation');
        Route::get('/clients/{id}/send-email', [ClientController::class, 'sendEmail'])->name('clients.sendEmail');
        });
    
        
        Route::middleware([ClientMiddleware::class])->group(function () {
        Route::get('/client-dashboard', [DashboardController::class, 'client'])->name('client.dashboard')->middleware(ClientMiddleware::class);
        });
        Route::resource('clients', ClientController::class);
        // reseptioneste et client
        Route::get('/reservations/{id}/paiement', [ReservationController::class, 'showPaiement'])->name('reservations.paiement');
        Route::post('/facture/{id}/pdf', [FactureController::class, 'telechargerFacture'])->name('facture.pdf');
        
        ///   AuthController
        Route::get('/Login/create', [AuthController::class, 'logincreate'])->name('Login.create');
        Route::post('/Login/store', [AuthController::class, 'Loginstore'])->name('Login.store');
        Route::get('/inscription/create', [AuthController::class, 'createinscription'])->name('inscription.create');
        Route::post('/inscription/store', [AuthController::class, 'storeinscreption'])->name('inscription.store');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dachbord', [AuthController::class, 'main'])->name('dach');
        Route::get('/contactReseptioneste', [ReservationController::class, 'contactReseptioneste'])->name('reservations.contactReseptioneste');

        Route::post('/contact_send',[ReservationController::class,"contactsendReseptioneste"])->name('contactReseptsioneste.send');