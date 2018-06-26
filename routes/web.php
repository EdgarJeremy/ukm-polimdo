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

/**
 * UKM Routes
 */
Route::group(['prefix' => 'ukm'], function(){
    Route::get('/{id}', 'UkmController@home')->name('ukm-page');
    Route::get('/{id}/kegiatan', 'UkmController@kegiatan')->name('ukm-kegiatan');
    Route::get('/{id}/pengumuman', 'UkmController@pengumuman')->name('ukm-pengumuman');
    Route::get('/{id}/tentang', 'UkmController@tentang')->name('ukm-tentang');
    Route::get('/{id}/faq', 'UkmController@faq')->name('ukm-faq');
    Route::get('/{id}/kontak', 'UkmController@kontak')->name('ukm-kontak');
    Route::post('/{id}/kontak', 'UkmController@simpan_kontak');
    Route::get('/{id}/galeri/{tahun}', 'UkmController@galeri')->name('ukm-galeri');
    Route::get('/{id}/struktur_organisasi', 'UkmController@struktur_organisasi')->name('ukm-struktur_organisasi');
    Route::get('/{id}/keanggotaan', 'UkmController@keanggotaan')->name('ukm-keanggotaan');
    Route::get('/{id}/pendaftaran', 'UkmController@pendaftaran')->name('ukm-pendaftaran');
});

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