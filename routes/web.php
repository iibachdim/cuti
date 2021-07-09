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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    //User
    Route::get('/dashboard', 'DashboardController@indexAdmin')->name('index-admin');
    Route::get('/userList', 'UserController@index')->name('user-list');
    Route::get('/create', 'UserController@create')->name('user-create');
    Route::post('/store', 'UserController@store')->name('user-store');
    Route::get('/editUser/{id}', 'UserController@edit')->name('user-edit');
    Route::put('/updateUser/{id}', 'UserController@update')->name('user-update');
    Route::delete('/delete', 'UserController@destroy')->name('user-delete');

    //Cuti
    Route::get('/cutiList', 'CutiController@index')->name('cuti-list');
    Route::get('/cutiCreate', 'CutiController@createCuti')->name('cuti-create');
    Route::post('/cutiStore', 'CutiController@storeCuti')->name('cuti-store');
    Route::get('/cutiAdd/{id}', 'CutiController@addCuti')->name('cuti-add');
    Route::post('/cutiUpdate/{id}', 'CutiController@updateCuti')->name('cuti-update');

    //Pengajuan
    Route::get('/pengajuanList', 'PengajuanController@index')->name('pengajuan-list');
    Route::post('/pengajuanAccept/{id}', 'PengajuanController@accept')->name('pengajuan-accept');
    Route::get('/pengajuanDetail/{id}', 'PengajuanController@detail')->name('pengajuan-detail');
});

Route::group(['prefix' => 'staff', 'middleware' => ['role:staff']], function () {
    //User
    Route::get('/dashboard', 'DashboardController@indexStaff')->name('index-staff');
    Route::get('/userList-staff', 'UserController@index')->name('staff-userList');
    Route::get('/create-staff', 'UserController@create')->name('staff-userCreate');
    Route::post('/store-staff', 'UserController@store')->name('staff-userStore');

    //Profil
    Route::get('/profil-staff', 'UserController@profil')->name('staff-profil');
    Route::get('/editProfil-staff/{id}', 'UserController@editProfil')->name('staff-profilEdit');
    Route::put('/updateProfil-staff/{id}', 'UserController@updateProfil')->name('staff-profilUpdate');

    //Cuti
    Route::get('/cutiList-staff', 'CutiController@index')->name('staff-cutiList');
    Route::get('/cutiAdd-staff/{id}', 'CutiController@addCuti')->name('staff-cutiAdd');
    Route::post('/cutiUpdate-staff/{id}', 'CutiController@updateCuti')->name('staff-cutiUpdate');

    //Pengajuan
    Route::get('/pengajuanList-staff', 'PengajuanController@index')->name('staff-pengajuanList');
    Route::post('/pengajuanAccept-staff/{id}', 'PengajuanController@accept')->name('staff-pengajuanAccept');
    Route::get('/pengajuanDetail-staff/{id}', 'PengajuanController@detail')->name('staff-pengajuanDetail');

});

Route::group(['prefix' => 'karyawan', 'middleware' => ['role:karyawan']], function () {
    //Profil
    Route::get('/dashboard', 'DashboardController@indexKaryawan')->name('index-karyawan');
    Route::get('/profil', 'UserController@profil')->name('profil');
    Route::get('/editProfil/{id}', 'UserController@editProfil')->name('profil-edit');
    Route::put('/updateProfil/{id}', 'UserController@updateProfil')->name('profil-update');

    //Pengajuan Cuti
    Route::get('/pengajuan', 'PengajuanController@formPengajuan')->name('pengajuan-cuti');
    Route::post('/prosesPengajuan', 'PengajuanController@prosesPengajuan')->name('proses-pengajuan');

    //Status Pengajuan
    Route::get('/statusPengajuan', 'PengajuanController@status')->name('status-pengajuan');
});
