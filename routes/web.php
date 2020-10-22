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
Route::post('/mading/ajuan', 'AjuanController@store' );

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
Route::get('/buku-induk/siswa/selengkapnya/{siswa}', 'SiswaController@selengkapnya');

// buku induk guru
Route::get('/buku-induk/guru/home', 'GuruController@home');
Route::get('/buku-induk/guru/selengkapnya/{guru}', 'GuruController@selengkapnya');

// ruang
Route::get('/ruang/home', 'RuangController@home');

// kelas dan jurusan
Route::get('/kelas', 'KelasController@index');
Route::get('/kelas/{kelas}/{jurusan}', 'KelasController@show');

// sekolah
Route::get('/sekolah','SekolahController@index');

// jadwal

Route::get('/jadwal/home', 'HomeController@jadwal');

// jadwal kelas
Route::get('/jadwal-kelas/home', 'JadwalKelasController@home');
Route::get('/jadwal-kelas/jadwal', 'JadwalKelasController@jadwal');

// Auth::routes();
Auth::routes(['register' => false]);
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard','HomeController@dashboard')->name('dashboard');

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

        Route::resource('account-guru', 'Admin\AccountController',[
            'except' => ['show']
        ]);

        // admin
        Route::get('/profile', 'Admin\ProfileController@index');
        Route::put('/profile/{user}', 'Admin\ProfileController@update');
        Route::get('/profile/change-password', 'Admin\ProfileController@ubah');
        Route::put('/profile/change-password/{user}', 'Admin\ProfileController@change');
    });
    
    // mading
    Route::resource('mading', 'PostController');

    // ajuan
    Route::get('/ajuan', 'AjuanController@index');
    Route::get('/ajuan/detail/{ajuan}', 'AjuanController@show');
    Route::post('/ajuan/publish/{ajuan}', 'AjuanController@publish');

    // peran
    Route::get('/saran/table', 'SaranController@index');
    Route::get('/pengajuan/table', 'PengajuanController@index');

    // buku induk

    // buku induk siswa
    Route::resource('/buku-induk/siswa', 'SiswaController');

    // buku induk guru
    Route::resource('/buku-induk/guru', 'GuruController');
    
    // jurusan
    Route::resource('jurusan', 'JurusanController');

    // ruang
    Route::resource('/ruang', 'RuangController', [
        'except' => ['show']
    ]);
    
    // sekolah
    Route::get('/sekolah/detail', 'SekolahController@show');
    Route::get('/sekolah/edit', 'SekolahController@edit');
    Route::put('/sekolah/{sekolah}', 'SekolahController@update');

    // jadwal kelas
    Route::resource('jadwal-kelas', 'JadwalKelasController');
});
