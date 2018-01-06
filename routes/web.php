<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('home');
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
});