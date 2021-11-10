<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('login', '\Invoque\Hermes\Http\Controllers\AuthController@login')->name('login');
    Route::post('login', '\Invoque\Hermes\Http\Controllers\AuthController@postLogin')->name('auth.login');
    Route::get('logout', '\Invoque\Hermes\Http\Controllers\AuthController@getLogout')->name('auth.logout');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/users', \Invoque\Hermes\Http\Livewire\Security\Users\UsersComponent::class)->name('security.users');
    Route::get('/profiles', Invoque\Hermes\Http\Livewire\Security\Profiles\ProfilesComponent::class)->name('security.profiles');
});
