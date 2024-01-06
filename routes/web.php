<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//route untuk data mahasiswa
route::get('/mahasiswa', 'MahasiswaController@mahasiswatampil');
route::post('/mahasiswa/tambah','MahasiswaController@mahasiswatambah');
route::get('/mahasiswa/hapus/{id_mahasiswa}','MahasiswaController@mahasiswahapus');
route::put('/mahasiswa/edit/{id_mahasiswa}','MahasiswaController@mahasiswaedit');

//route untuk data mahasiswa
route::get('/home', function(){return view('view_home');});

//route untuk data dosen
route::get('/dosen', 'DosenController@dosentampil');

//route untuk data prodi
route::get('/prodi', 'ProdiController@proditampil');

//route untuk data matkul
route::get('/matkul', 'MatkulController@matkultampil');