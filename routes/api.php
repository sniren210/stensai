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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Admin\AuthApiController@login');
    // Route::post('signup', 'Admin\AuthApiController@signup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Admin\AuthApiController@logout');
        Route::get('user', 'Admin\AuthApiController@user');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('siswa', 'Api\SiswaController');
    Route::resource('jurusan', 'Api\JurusanController');
    Route::resource('ajuan', 'Api\AjuanController');
    Route::resource('event', 'Api\EventController');
    Route::resource('guru', 'Api\GuruController');
    Route::resource('jadwal-kelas', 'Api\JadwalKelasController');
    Route::resource('jadwal-guru', 'Api\JadwakGuruController');
    Route::resource('jadwal-ruang', 'Api\JadwalRuangController');
    Route::resource('kategori-post', 'Api\KategoriPostController');
    Route::resource('kelas', 'Api\KelasController');
    Route::resource('mapel', 'Api\MapelController');
    Route::resource('nilai-siswa', 'Api\NilaiSiswaController');
    Route::resource('post', 'Api\PostController');
    Route::resource('ruang', 'Api\RuangController');
    Route::resource('saran', 'Api\SaranController');
    Route::resource('sekolah', 'Api\SekolahController');
    Route::resource('wali-kelas', 'Api\WaliKelasController');
    Route::resource('pengajuan', 'Api\PengajuanController');
});
