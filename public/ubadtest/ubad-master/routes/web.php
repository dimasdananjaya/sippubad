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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('index');
Route::get('/', 'HomeController@index')->name('index');

Route::get('/teknologi-pangan', 'RouteController@teknologiPanganPage')->name('teknologi-pangan');
Route::get('/teknik-biomedis', 'RouteController@teknikBiomedisPage')->name('teknik-biomedis');
Route::get('/psikologi', 'RouteController@psikologiPage')->name('psikologi');
Route::get('/gizi', 'RouteController@giziPage')->name('gizi');
Route::get('/farmasi', 'RouteController@farmasiPage')->name('farmasi');
Route::get('/akuntansi', 'RouteController@akuntansiPage')->name('akuntansi');
Route::get('/hubungan-masyarakat', 'RouteController@hubunganMasyarakatPage')->name('hubungan-masyarakat');
Route::get('/bahasa-inggris', 'RouteController@bahasaInggrisPage')->name('bahasa-inggris');
Route::get('/hukum', 'RouteController@hukumPage')->name('hukum');
Route::get('/sistem-informasi', 'RouteController@sistemInformasiPage')->name('sistem-informasi');

Route::get('/tentang-ubad', 'RouteController@tentangUbadPage')->name('tentang-ubad');
Route::get('/visi-misi', 'RouteController@visiMisiPage')->name('visi-misi');
Route::get('/mahasiswa-baru', 'RouteController@mahasiswaBaruPage')->name('mahasiswa-baru');
Route::get('/seleksi-online', 'RouteController@seleksiOnlinePage')->name('seleksi-online');
Route::get('/staff', 'RouteController@staffPage')->name('staff');

// Blogs route

Route::resource('blogs', 'BlogController');
