<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/register', \App\Http\Livewire\Register\RegisterComponent::class)->name('register');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', \App\Http\Livewire\DashboardComponent::class)->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/clients', App\Http\Livewire\Client\ClientComponent::class)->name('management.client');
});
