<?php

use App\Livewire\Pages\Home;
use App\Livewire\Pages\Saber;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/saberes/{saber:slug}', Saber::class)->name('saber.show');
Route::redirect('/login', '/admin/login', 301);


// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
