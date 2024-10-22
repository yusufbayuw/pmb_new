<?php

use App\Livewire\Forms\Utb;
use App\Livewire\Landing;
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

Route::get('/login', function () {
    return redirect('/portal/login');
})->name('login');
