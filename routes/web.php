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
    Route::get('/{id}/kegiatan/{id_kegiatan}', 'UkmPagesController@baca_kegiatan')->name('ukm-baca_kegiatan');
    Route::get('/{id}/pengumuman', 'UkmPagesController@pengumuman')->name('ukm-pengumuman');
    Route::get('/{id}/pengumuman/{id_pengumuman}', 'UkmPagesController@baca_pengumuman')->name('ukm-baca_pengumuman');
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
    Route::get('/letter_in', 'AdminPagesController@letter_in')->name('admin-letter_in');
    Route::get('/letter_out', 'AdminPagesController@letter_out')->name('admin-letter_out');
    Route::post('/letter_out', 'AdminPagesController@save_letter');
    Route::get('/gallery', 'AdminPagesController@gallery')->name('admin-gallery');
    Route::post('/gallery', 'AdminPagesController@save_gallery');
    Route::get('/member', 'AdminPagesController@member')->name('admin-member');
    Route::get('/registration', 'AdminPagesController@registration')->name('admin-registration');
    Route::post('/set_registration', 'AdminPagesController@set_registration')->name('admin-set_registration');
    Route::get('/registration_approve/{id}', 'AdminPagesController@registration_approve')->name('admin-registration_approve');
    Route::get('/activity', 'AdminPagesController@activity')->name('admin-activity');
    Route::post('/activity', 'AdminPagesController@save_activity');
    Route::get('/delete_activity/{id}', 'AdminPagesController@delete_activity')->name('admin-delete_activity');
    Route::get('/announcement', 'AdminPagesController@announcement')->name('admin-announcement');
    Route::post('/announcement', 'AdminPagesController@save_announcement');
    Route::get('/delete_announcement/{id}', 'AdminPagesController@delete_announcement')->name('admin-delete_announcement');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');
});