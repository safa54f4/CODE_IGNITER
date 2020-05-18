<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'UserController@welcome_home')->name("dari_ci");

// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => false, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
// ]);

Route::get('/login', 'ApiController@login_form')->name('api.login_form');
Route::post('/login', 'ApiController@login')->name('api.login');
Route::get('/logout', 'ApiController@logout')->name('api.logout');

Route::get('/home', 'ApiController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/tambah', 'UserController@tambah')->name('user.tambah');
Route::post('/user/tambah', 'UserController@add')->name('user.add');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/edit/{id}', 'UserController@update')->name('user.update');
Route::get('/user/hapus/{id}', 'UserController@hapus')->name('user.hapus');
Route::post('/user/hapus/{id}', 'UserController@delete')->name('user.delete');

Route::get('/mahasiswa', 'UserController@mahasiswa_index')->name('mahasiswa.index');
Route::get('/mahasiswa/krs', 'MahasiswaController@krs')->name('mahasiswa.krs');
Route::get('/mahasiswa/jadwal', 'MahasiswaController@jadwal')->name('mahasiswa.jadwal');

Route::get('/jadwal', 'UserController@semua_jadwal')->name('admin.jadwal');
Route::get('/jadwal/tambah', 'UserController@tambah_jadwal')->name('admin.tambah_jadwal');
Route::post('/jadwal/tambah', 'UserController@add_jadwal');
Route::get('/jadwal/edit/{id}', 'UserController@edit_jadwal')->name('admin.edit_jadwal');
Route::post('/jadwal/edit/{id}', 'UserController@update_jadwal');
Route::get('/jadwal/hapus/{id}', 'UserController@hapus_jadwal')->name('admin.hapus_jadwal');
Route::post('/jadwal/hapus/{id}', 'UserController@delete_jadwal');

Route::get("/api", "ApiController@index")->name("api.index");
