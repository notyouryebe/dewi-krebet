<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::middleware(['auth'])->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});

//routeeditdanhapus
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

//routelaporan
Route::get('/report', [TransactionController::class, 'report'])->name('transactions.report');


Route::get('/', function () {
    return view('welcome');
});
