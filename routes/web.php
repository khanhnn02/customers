<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return view('welcome');
});


Route::resource('customers', CustomerController::class);
Route::get('/customers/{customer}/delete', [CustomerController::class, 'confirmDelete'])->name('customers.confirmDelete');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
