<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resources([
        'administrative-regions' => 'AdministrativeRegionController',
    ]);
    Route::resources([
        'cooperators' => 'CooperatorController',
    ]);
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
