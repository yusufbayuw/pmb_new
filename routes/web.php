<?php

use App\Livewire\Forms\Utb;
use App\Livewire\Landing;
use Barryvdh\DomPDF\Facade\Pdf;
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

Route::get('/', Landing::class)->name('landing');
Route::get('/pendaftaran', Utb::class)->name('pendaftaran');
Route::get('/pdf', function () {
    $pdf = Pdf::loadView('pdf.index')->setPaper('a4', 'potrait');
    return $pdf->stream();
});
Route::get('/login', function () {
    return redirect('/portal/login');
})->name('login');
