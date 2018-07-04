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
    $listUkm = App\Ukm::all();
    return view('front.index')->with(['listUkm' => $listUkm]);
})->name('root');

/**
 * UKM Routes
 */
Route::group(['prefix' => 'ukm'], function(){
    Route::get('/{id}', 'UkmPagesController@home')->name('ukm-page');
    Route::get('/{id}/kegiatan', 'UkmPagesController@kegiatan')->name('ukm-kegiatan');
    Route::get('/{id}/pengumuman', 'UkmPagesController@pengumuman')->name('ukm-pengumuman');
    Route::get('/{id}/tentang', 'UkmPagesController@tentang')->name('ukm-tentang');
    Route::get('/{id}/faq', 'UkmPagesController@faq')->name('ukm-faq');
    Route::get('/{id}/kontak', 'UkmPagesController@kontak')->name('ukm-kontak');
    Route::post('/{id}/kontak', 'UkmPagesController@simpan_kontak');
    Route::get('/{id}/galeri/{tahun}', 'UkmPagesController@galeri')->name('ukm-galeri');
    Route::get('/{id}/struktur_organisasi', 'UkmPagesController@struktur_organisasi')->name('ukm-struktur_organisasi');
    Route::get('/{id}/keanggotaan', 'UkmPagesController@keanggotaan')->name('ukm-keanggotaan');
    Route::get('/{id}/pendaftaran', 'UkmPagesController@pendaftaran')->name('ukm-pendaftaran');
    Route::post('/{id}/pendaftaran', 'UkmPagesController@simpan_pendaftaran');
});

/**
 * Back/Administrator Routes 
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'AdminPagesController@index')->name('admin-home');
    Route::get('/message', 'AdminPagesController@message')->name('admin-message');
    Route::get('/delete_message/{id}', 'AdminPagesController@delete_message')->name('admin-delete_message');
    Route::get('/profile', 'AdminPagesController@profile')->name('admin-profile');
    Route::post('/profile', 'AdminPagesController@save_profile');
    Route::get('/user', 'AdminPagesController@user')->name('admin-user');
    Route::post('/user', 'AdminPagesController@save_user');
    Route::get('/cash', 'AdminPagesController@cash')->name('admin-cash');
    Route::post('/cash', 'AdminPagesController@save_cash');
    Route::get('/delete_cash/{id}', 'AdminPagesController@delete_cash')->name('admin-delete_cash');
    Route::get('/transaction', 'AdminPagesController@transaction')->name('admin-transaction');
    Route::post('/transaction', 'AdminPagesController@save_transaction');
    Route::get('/report', 'AdminPagesController@report')->name('admin-report');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');
});