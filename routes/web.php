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
Route::post('/cooperators', 'WelcomeController@cooperators')->name('welcome.cooperators');
Route::post('/praying-houses', 'WelcomeController@prayingHouses')->name('welcome.praying-houses');

Auth::routes(['verify' => true]);

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware(['auth', 'can:admin', 'tenant', 'bindings'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    
    Route::resources([
        'administrative-regions' => 'AdministrativeRegionController',
        'cooperators' => 'CooperatorController',
        'praying-houses' => 'PrayingHouseController',
        'list-casters' => 'ListCasterController',
    ]);

    Route::get('list-casters/{listCaster}/enable', 'ListCasterController@enable')->name('list-casters.enable');
    Route::post('list-casters/{listCaster}/cooperator', 'ListCasterController@cooperator')->name('list-casters.cooperator');
    Route::post('list-casters/{listCaster}/praying-house', 'ListCasterController@prayingHouse')->name('list-casters.praying-house');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
