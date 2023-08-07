<?php

use App\Http\Controllers\KeretaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PemesananOfflineController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\StasiunKeretaController;
use App\Http\Controllers\UserController;
use App\Models\StasiunKereta;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/logout',[UserController::class,'logout'])->name('logout');
//Authentication
Route::middleware(['guest'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/register','register')->name('registerView');
        Route::post('/register','register')->name('register');
        Route::get('/login','login')->name('loginView');
        Route::post('/login','login')->name('login');
    });
});
//Admin
 Route::middleware(['role:admin'])->group(function(){
    Route::controller(KeretaController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
        Route::get('/admin','keretaList')->name('keretaList');
        Route::post('/tambahkereta','keretaList')->name('postkereta');
        Route::put('/suntingkereta/{id}','keretaList')->name('editkereta');
        Route::delete('/hapuskereta/{id}','keretaList')->name('deletekereta');
    });
    Route::controller(StasiunKeretaController::class)->group(function(){
        Route::get('/pemberhentian','stasiunkereta')->name('stasiunkereta');
        Route::post('/tambahpemberhentian','stasiunkereta')->name('poststasiunkereta');
        Route::put('/suntingpemberhentian/{id}','stasiunkereta')->name('putstasiunkereta');
        Route::delete('/hapuspemberhentian/{id}','stasiunkereta')->name('deletestasiunkereta');
        Route::post('/kereta-pesan','jadwal')->name('keretapem');
        Route::post('/pem','sk')->name('sk');
    });
    Route::controller(StasiunController::class)->group(function(){
        Route::get('/stasiun','stasiun')->name('stasiun');
        Route::post('/tambahstasiun','stasiun')->name('poststasiun');
        Route::put('/suntingstasiun/{id}','stasiun')->name('editstasiun');
        Route::delete('/hapusstasiun/{id}','stasiun')->name('deletestasiun');
    });
    Route::controller(PenumpangController::class)->group(function(){
        Route::get('/manage-passanger','passangermanage')->name('managepass');
        Route::get('/add-passanger','addpassanger')->name('addpass');
    });
    Route::controller(PemesananController::class)->group(function(){
        Route::get('/pemesanan/{id}','detail')->name('detailpemesanan');
        Route::put('/ubah-status/{id}','editstatus')->name('editpemesanan');
        Route::get('/status-belum','allpemesanan')->name('statusbelum');
        Route::get('/status-sudah','allpemesanan')->name('statussudah');
    });
    Route::controller(PemesananOfflineController::class)->group(function(){
        Route::get('/pesandulur/{kereta}/{stasiunkereta}','pacul')->name('paculw');
        Route::post('/pesan-offline','pacul')->name('postorder');
    });
 });
//Staff
Route::middleware(['role:staff'])->group(function(){
});
//Customer
Route::middleware(['role:customer'])->group(function(){
    Route::controller(StasiunController::class)->group(function(){
        Route::get('/home','stasiuncustomer')->name('homeCustomer');
    });
    Route::controller(StasiunKeretaController::class)->group(function(){
        Route::post('/pemberhentian_kereta','pemberhentian')->name('postpemberhentian');
    });
    Route::controller(PenumpangController::class)->group(function(){
        Route::post('/penumpang','penumpang')->name('penumpang');
    });
    Route::controller(PemesananController::class)->group(function(){
        Route::post('/pemesanan','pemesanan')->name('pemesanan');
        Route::get('/print','printticket')->name('printticket');
    });
});