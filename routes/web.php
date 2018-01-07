<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('home');
});

/**
 * Account
 */
Route::group(['prefix' => 'account', 'middleware' => 'auth', 'namespace' => 'Account', 'as' => 'account.'], function () {
    Route::get('/', 'AccountController@index')->name('index');

    /**
     * Profile
     */
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');

    /**
     * Change Password
     */
    Route::get('/password', 'PasswordController@index')->name('password.index');
    Route::post('/password', 'PasswordController@store')->name('password.store');
});

Route::group(['prefix' => 'activation', 'middleware' => ['guest', 'confirmation_token.expired:/'], 'as' => 'activation.'], function () {
    Route::get('/{confirmation_token}', 'Auth\\ActivationController@activate')->name('activate');
});