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

Route::get('/', 'WelcomeController@index');

Route::post('/administrative-regions', 'WelcomeController@administrativeRegion')->name('welcome.administrative-region');
Route::post('/cooperator', 'WelcomeController@cooperator')->name('welcome.cooperator');
Route::post('/praying-house', 'WelcomeController@prayingHouse')->name('welcome.praying-house');

Auth::routes(['verify' => true]);

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware(['auth', 'can:admin', 'tenant', 'bindings'])->group(function () {
    Route::get('/', 'DashBoardController@index')->name('index');
    Route::prefix('/users')->middleware(['can:root'])->group(function () {
        Route::get('/{id}', 'UserController@edit')->name('users.edit');
        Route::put('/{id}', 'UserController@update')->name('users.update');
    });

    Route::resources([
        'administrative-regions' => 'AdministrativeRegionController',
        'cooperators'            => 'CooperatorController',
        'praying-houses'         => 'PrayingHouseController',
        'list-casters'           => 'ListCasterController',
    ]);

    Route::get('list-casters/{listCaster}/enable', 'ListCasterController@enable')->name('list-casters.enable');
    Route::post('list-casters/{listCaster}/cooperator', 'ListCasterController@cooperator')->name('list-casters.cooperator');
    Route::post('list-casters/{listCaster}/praying-house', 'ListCasterController@prayingHouse')->name('list-casters.praying-house');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
