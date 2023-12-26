<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TripController;
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
    return view('welcome');
});



Route::prefix('user')->as('user.')->group(function(){
    Route::get('/',[TripController::class,'index'])->name('pages.index');
    Route::get('/mytrip',[TripController::class,'mytrip'])->name('pages.mytrip');
    Route::post('/',[TripController::class,'searchBuss'])->name('searchBuss');
    
    Route::get('/show',[TripController::class,'show'])->name('pages.show');
    Route::get('/pay',[InvoiceController::class,'payable'])->name('pages.payable');

    Route::post('/payalbe',[InvoiceController::class,'pay'])->name('pay');
   
});