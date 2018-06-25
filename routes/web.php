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

/**
 * Auth Routes
 */

Auth::routes();

/**
 * Front Routes
 */

Route::get('/', function () {
    return view('front.index');
})->name('root');

Route::get('/ukm/{id}', function($id){
    return view('ukm.index');
})->name('ukm-page');


/**
 * Back/Administrator Routes 
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'AdminController@index');
    
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');
});