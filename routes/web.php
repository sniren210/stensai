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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// mading online
Route::get('/mading/home/{id?}', 'PostController@home');
Route::get('/mading/selengkapnya/{post}', 'PostController@selengkapnya');

// ajuan
Route::get('/mading/ajuan', 'AjuanController@create');
Route::post('/mading/ajuan', 'AjuanController@store');

// peran
Route::get('/peran', 'HomeController@peran');
Route::get('/peran/saran', 'SaranController@create');
Route::post('/peran/saran', 'SaranController@store');
Route::get('/peran/pengajuan', 'PengajuanController@create');
Route::post('/peran/pengajuan', 'PengajuanController@store');

// buku induk
Route::get('/buku-induk', 'HomeController@bukuInduk');

// buku induk siswa
Route::get('/buku-induk/siswa/home', 'SiswaController@home');
Route::get(
    '/buku-induk/siswa/selengkapnya/{siswa}',
    'SiswaController@selengkapnya'
);

// nilai siswa
Route::get('/buku-induk/nilai/{nilai_siswa}', 'NilaiSiswaController@nilai');

// buku induk guru
Route::get('/buku-induk/guru/home', 'GuruController@home');
Route::get(
    '/buku-induk/guru/selengkapnya/{guru}',
    'GuruController@selengkapnya'
);

// ruang
Route::get('/ruang/home', 'RuangController@home');

// kelas dan jurusan
Route::get('/kelas-jurusan', 'KelasController@kelas_jurusan');
Route::get('/lihat-kelas/{kelas}', 'KelasController@lihat_siswa');

// sekolah
Route::get('/sekolah', 'SekolahController@index');

// jadwal

Route::get('/jadwal/home', 'HomeController@jadwal');

// jadwal kelas
Route::get('/jadwal-kelas/home', 'JadwalKelasController@home');
Route::get(
    '/jadwal-kelas/jadwal/{jadwal_kelas}',
    'JadwalKelasController@jadwal'
);

// jadwal guru
Route::get('/jadwal-guru/home', 'JadwalGuruController@home');
Route::get('/jadwal-guru/jadwal/{jadwal_guru}', 'JadwalGuruController@jadwal');

// jadwal ruang
Route::get('/jadwal-ruang/home', 'JadwalRuangController@home');
Route::get(
    '/jadwal-ruang/jadwal/{jadwal_ruang}',
    'JadwalRuangController@jadwal'
);

// Auth::routes();
Auth::routes(['register' => false]);
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    // Manual Route
    // Route::get('/student', 'StudentController@index');
    // Route::post('/student', 'StudentController@store');
    // Route::get('/student/create', 'StudentController@create');
    // Route::get('/student/{student}', 'StudentController@show');
    // Route::patch('/student/{student}', 'StudentController@update');
    // Route::get('/student/{student}/edit', 'StudentController@edit');
    // Route::delete('/student/{student}', 'StudentController@destroy');

    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/try', 'TryController@index');
        Route::get('/try/export', 'TryController@export');
        Route::post('/try/import', 'TryController@import');
        Route::get('/try/pdf', 'TryController@pdf');

        Route::resource('account-guru', 'Admin\AccountController', [
            'except' => ['show'],
        ]);

        // admin
        Route::get('/profile', 'Admin\ProfileController@index');
        Route::put('/profile/{user}', 'Admin\ProfileController@update');
        Route::get('/profile/change-password', 'Admin\ProfileController@ubah');
        Route::put(
            '/profile/change-password/{user}',
            'Admin\ProfileController@change'
        );

        // api tokens
        // Route::get('/api-tokens', 'Admin\APIController@index');
        // Route::post('/api-tokens', 'Admin\APIController@post');
    });

    // mading
    Route::resource('mading', 'PostController');

    // ajuan
    Route::get('/ajuan', 'AjuanController@index');
    Route::get('/ajuan/detail/{ajuan}', 'AjuanController@show');
    Route::post('/ajuan/publish/{ajuan}', 'AjuanController@publish');

    // peran
    Route::get('/saran/table', 'SaranController@index');
    Route::get('/saran/export', 'SaranController@export');
    Route::get('/pengajuan/table', 'PengajuanController@index');
    Route::get('/pengajuan/export', 'PengajuanController@export');

    // buku induk

    // buku induk siswa
    Route::resource('/buku-induk/siswa', 'SiswaController');
    Route::get('/buku-induk/export/siswa', 'SiswaController@export');
    Route::post('/buku-induk/import/siswa', 'SiswaController@import');

    // buku induk guru
    Route::resource('/buku-induk/guru', 'GuruController');
    Route::get('/buku-induk/export/guru', 'GuruController@export');
    Route::post('/buku-induk/import/guru', 'GuruController@import');

    // jurusan
    Route::resource('jurusan', 'JurusanController', [
        'except' => ['show'],
    ]);

    // ruang
    Route::resource('/ruang', 'RuangController', [
        'except' => ['show'],
    ]);

    // sekolah
    Route::get('/sekolah/detail', 'SekolahController@show');
    Route::get('/sekolah/edit', 'SekolahController@edit');
    Route::put('/sekolah/{sekolah}', 'SekolahController@update');

    // jadwal kelas
    Route::resource('jadwal-kelas', 'JadwalKelasController');
    Route::resource('jadwal-guru', 'JadwalGuruController');
    Route::resource('jadwal-ruang', 'JadwalRuangController');

    // nilai siswa
    Route::resource('/buku-induk/nilai-siswa', 'NilaiSiswaController');

    // kelas
    Route::resource('/kelas', 'KelasController');
});
