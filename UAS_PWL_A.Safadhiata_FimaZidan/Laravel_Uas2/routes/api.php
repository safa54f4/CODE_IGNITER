<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get("/login", "ApiController@login")->name("api.login");

// Cara pakai
// taruh di header kalau mau request ajax
// Accept : application/json
// Authorization : Bearer <api token>


Route::post("/login", "ApiController@login")->name("api.login");
Route::get("/login", "ApiController@cobalogin")->name("api.cobalogin");

Route::middleware('auth:api')->get('/mahasiswa', function (Request $request) {
    return $request->user()->mahasiswa;
});

Route::middleware('auth:api')->get('/mahasiswa/jadwal', "ApiController@jadwal");

Route::middleware('auth:api')->get('/mahasiswa/krs', "ApiController@krs");
