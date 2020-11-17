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

Route::get('/', 'HomeController@index')->name('home');
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

// event
Route::get('/peran/event', 'EventController@home');
Route::get('/peran/event/{event}', 'EventController@selengkapnya');

// sekolah
Route::get('/sekolah', 'SekolahController@index');

Route::prefix('siswa')->group(function () {
    Route::group(['middleware' => 'auth:siswa'], function () {
        // try
        Route::get('/try', 'TryController@siswa');

        // buku induk
        Route::get('/buku-induk', 'HomeController@bukuInduk');

        // buku induk siswa
        // Route::get('/buku-induk/siswa/home', 'SiswaController@home');
        // Route::get(
        //     '/buku-induk/siswa/selengkapnya/{siswa}',
        //     'SiswaController@selengkapnya'
        // );
        Route::get('/siswa', 'SiswaController@siswa');
        Route::get('/nilai', 'NilaiSiswaController@siswa');

        // nilai siswa
        Route::get(
            '/buku-induk/nilai/{nilai_siswa}',
            'NilaiSiswaController@nilai'
        );

        // buku induk guru
        Route::get('/buku-induk/guru/home', 'GuruController@home');
        Route::get(
            '/buku-induk/guru/selengkapnya/{guru}',
            'GuruController@selengkapnya'
        );

        // ruang
        Route::get('/ruang/home', 'RuangController@home');

        // kelas dan jurusan
        Route::get('/kelas-jurusan', 'KelasController@siswa');
        // Route::get('/kelas-jurusan', 'KelasController@kelas_jurusan');
        // Route::get('/lihat-kelas/{kelas}', 'KelasController@lihat_siswa');

        // jadwal

        Route::get('/jadwal/home', 'HomeController@jadwal');

        // jadwal kelas
        // Route::get('/jadwal-kelas/home', 'JadwalKelasController@home');
        // Route::get(
        //     '/jadwal-kelas/jadwal/{jadwal_kelas}',
        //     'JadwalKelasController@jadwal'
        // );
        Route::get('/jadwal-kelas/jadwal/', 'JadwalKelasController@kelas');

        // jadwal guru
        Route::get('/jadwal-guru/home', 'JadwalGuruController@home');
        Route::get(
            '/jadwal-guru/jadwal/{jadwal_guru}',
            'JadwalGuruController@jadwal'
        );

        // jadwal ruang
        Route::get('/jadwal-ruang/home', 'JadwalRuangController@home');
        Route::get(
            '/jadwal-ruang/jadwal/{jadwal_ruang}',
            'JadwalRuangController@jadwal'
        );
    });
});
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
    Route::delete('/saran/{saran}', 'SaranController@delete');
    Route::get('/saran/export', 'SaranController@export');
    Route::get('/saran/pdf', 'SaranController@pdf');
    Route::get('/pengajuan/table', 'PengajuanController@index');
    Route::delete('/pengajuan/{pengajuan}', 'PengajuanController@delete');
    Route::get('/pengajuan/export', 'PengajuanController@export');
    Route::get('/pengajuan/pdf', 'PengajuanController@pdf');

    // event
    Route::resource('event', 'EventController');

    // buku induk

    // buku induk siswa
    Route::resource('/buku-induk/siswa', 'SiswaController');
    Route::get('/buku-induk/export/siswa', 'SiswaController@export');
    Route::get('/buku-induk/pdf/siswa', 'SiswaController@pdf');
    Route::post('/buku-induk/import/siswa', 'SiswaController@import');

    // buku induk guru
    Route::resource('/buku-induk/guru', 'GuruController');
    Route::get('/buku-induk/export/guru', 'GuruController@export');
    Route::get('/buku-induk/pdf/guru', 'GuruController@pdf');
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
    Route::get(
        '/buku-induk/export/nilai-siswa/{id}',
        'NilaiSiswaController@export'
    );
    Route::get('/buku-induk/pdf/nilai-siswa/{id}', 'NilaiSiswaController@pdf');

    // kelas
    Route::resource('/kelas', 'KelasController');
});

Route::group(['middleware' => 'is_guru' ], function () {
    // try
    // Route::get('/try', 'TryController@guru');

    Route::get('/dashboard', 'HomeController@dashboard')->name(
        'guru.dashboard'
    );

    // mading
    Route::resource('mading', 'PostController',[
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);

    // ajuan
    Route::get('/ajuan', 'AjuanController@index');
    Route::get('/ajuan/detail/{ajuan}', 'AjuanController@show');
    // Route::post('/ajuan/publish/{ajuan}', 'AjuanController@publish');

    // peran
    Route::get('/saran/table', 'SaranController@index');
    Route::delete('/saran/{saran}', 'SaranController@delete');
    Route::get('/saran/export', 'SaranController@export');
    Route::get('/saran/pdf', 'SaranController@pdf');
    Route::get('/pengajuan/table', 'PengajuanController@index');
    Route::delete('/pengajuan/{pengajuan}', 'PengajuanController@delete');
    Route::get('/pengajuan/export', 'PengajuanController@export');
    Route::get('/pengajuan/pdf', 'PengajuanController@pdf');

    // event
    Route::resource('event', 'EventController');

    // buku induk

    // buku induk siswa
    Route::resource('/buku-induk/siswa', 'SiswaController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);
    Route::get('/buku-induk/export/siswa', 'SiswaController@export');
    Route::get('/buku-induk/pdf/siswa', 'SiswaController@pdf');
    Route::post('/buku-induk/import/siswa', 'SiswaController@import');

    // buku induk guru
    Route::resource('/buku-induk/guru', 'GuruController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);
    Route::get('/buku-induk/export/guru', 'GuruController@export');
    Route::get('/buku-induk/pdf/guru', 'GuruController@pdf');
    Route::post('/buku-induk/import/guru', 'GuruController@import');

    // jurusan
    Route::resource('jurusan', 'JurusanController', [
        'except' => ['show', 'edit', 'update', 'delete', 'store', 'create'],
    ]);

    // ruang
    Route::resource('/ruang', 'RuangController', [
        'except' => ['show', 'edit', 'update', 'store', 'delete', 'create'],
    ]);

    // sekolah
    Route::get('/sekolah/detail', 'SekolahController@show');
    // Route::get('/sekolah/edit', 'SekolahController@edit');
    Route::put('/sekolah/{sekolah}', 'SekolahController@update');

    // jadwal kelas
    Route::resource('jadwal-kelas', 'JadwalKelasController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);
    Route::resource('jadwal-guru', 'JadwalGuruController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);
    Route::resource('jadwal-ruang', 'JadwalRuangController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);

    // nilai siswa
    Route::resource('/buku-induk/nilai-siswa', 'NilaiSiswaController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);
    Route::get(
        '/buku-induk/export/nilai-siswa/{id}',
        'NilaiSiswaController@export'
    );
    Route::get('/buku-induk/pdf/nilai-siswa/{id}', 'NilaiSiswaController@pdf');

    // kelas
    Route::resource('/kelas', 'KelasController', [
        'except' => ['store', 'edit', 'update', 'delete', 'create'],
    ]);
});

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/login-siswa', 'Auth\SiswaLoginController@showLoginForm')->name(
    'siswa.login'
);
Route::post('/login-siswa', 'Auth\SiswaLoginController@login')->name(
    'siswa.login.submit'
);

Route::get('/login-guru', 'Auth\GuruLoginController@showLoginForm')->name(
    'guru.login'
);
Route::post('/login-guru', 'Auth\GuruLoginController@login')->name(
    'guru.login.submit'
);

// Route::post('/logout', 'Auth\SiswaLoginController@logout')->name('logout');

// Route::prefix('guru')->group(function () {
//     Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//     // Route::get(
//     //     '/register-guru',
//     //     'Auth\GuruRegisterController@showRegisterForm'
//     // )->name('guru.register');
//     // Route::post('/register-guru', 'Auth\GuruRegisterController@register')->name(
//     //     'guru.register.submit'
//     // );
// });
