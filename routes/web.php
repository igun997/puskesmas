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


Route::get('/', 'HomepageController@index');

Route::resource('pasien','PasienController');

Route::resource('rekammedis','RekamMedisController');

Route::resource('dokter','DokterController');

Route::resource('administrasi','AdministrasiController');

Route::resource('ruangan','RuanganController');


