<?php

use App\Http\Controllers\CarteController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('default');
});
Route::middleware(['custom.auth'])->group(function () {
    // Routes nécessitant une authentification, acceptant également votre méthode de session personnalisée
    Route::get('/welcome', [UserController::class, 'welcome']);
    Route::get('/deposit',[UserController::class,'deposit']);
    Route::post('/deposit/deposit_traitment',[UserController::class,'deposit_traitment'])->name('deposit_traitment');
    Route::get('/selftransfert', [UserController::class, 'selftransfert'])->name('selftransfert');
    Route::get('/lusers',[UserController::class,'lusers'])->name('lusers');
    Route::get('/foreigntransfert', [TransactionController::class, 'foreigntransfert'])->name('foreigntransfert');
    Route::post('/foreigntransfert/foreigntransfert_traitment', [TransactionController::class, 'foreigntransfert_traitment'])->name('foreigntransfert_traitment');
    Route::post('/selftransfert/selftransfert_traitment', [UserController::class, 'selftransfert_traitment'])->name('selftransfert_traitment');
    Route::get('/newcard',[CarteController::class,'newcard'])->name('newcard');
    Route::post('/newcard/newcard_traitment',[CarteController::class,'newcard_traitment'])->name('newcard_traitment');
    Route::get('/lusers/disablec/{objet}',[UserController::class,'disablec'])->name('disablec');
    Route::get('/lusers/enablec/{objet}',[UserController::class,'enablec'])->name('enablec');
});
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/register/traitment', [UserController::class, 'traitment_register'])->name('traitment_register');
Route::post('/login/traitment', [UserController::class, 'traitment_login'])->name('traitment_login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
