<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\StatusPegawaiController;

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
    return view('welcome');
});

Route::get('/hello', function () {
    return view('Hello World');
});


Route::get('/hello-world', [HelloWorldController::class, 'showHelloWorld']);

Route::get('/book', [BookController::class, 'index']);

// Route::get('/form', [FormController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

//Route Auth
Route::get('/login', [AuthController::class, 'index'])->name('pian-app.login'); 
Route::post('/proseslogin', [AuthController::class, 'login'])->name('pian-app.proseslogin'); 
Route::get('/register', [AuthController::class, 'create'])->name('pian-app.register'); 
Route::post('/prosesregister', [AuthController::class, 'register'])->name('pian-app.prosesregister'); 
Route::get('/proseslogout', [AuthController::class, 'logout'])->name('pian-app.logout'); 

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('pian-app.home');

    //Route Pegawai
    Route::get('/tablePegawai', [PegawaiController::class, 'index'])->name('pian-app.tablepegawai'); //menampilkan daftar pegawai
    Route::post('/prosesaddpegawai', [PegawaiController::class, 'store'])->name('pian-app.prosesaddpegawai'); //store data pegawai ke database
    Route::get('/formPegawai', [PegawaiController::class, 'create'])->name('pian-app.addpegawai'); //menampilkan form tambah pegawai
    Route::get('/pegawai{id}', [PegawaiController::class, 'edit'])->name('pian-app.editpegawai'); //menampilkan form edit data pegawai
    Route::put('/table2/{id}', [PegawaiController::class, 'update'])->name('pian-app.updatepegawai'); //update data pegawai
    Route::delete('/table2/{id}', [PegawaiController::class, 'destroy'])->name('pian-app.destroypegawai'); //delete data pegawai

    //Route Jenis Kelamin
    Route::get('/tableJenisKelamin', [JenisKelaminController::class, 'index'])->name('pian-app.tablejeniskelamin'); //menampilkan daftar jenis kelamin
    Route::get('/formJenisKelamin', [JenisKelaminController::class, 'create'])->name('pian-app.addjeniskelamin'); //menampilkan form tambah jenis kelamin
    Route::post('/prosesaddjeniskelamin', [JenisKelaminController::class, 'store'])->name('pian-app.prosesaddjeniskelamin'); //store data jenis kelamin ke database
    Route::get('/jenisKelamin{id}', [JenisKelaminController::class, 'edit'])->name('pian-app.editjeniskelamin'); //menampilkan form edit data jenis kelamin
    Route::put('/tableJenisKelamin/{id}', [JenisKelaminController::class, 'update'])->name('pian-app.updatejeniskelamin'); //update data jenis kelamin
    Route::delete('/tableJenisKelamin/{id}', [JenisKelaminController::class, 'destroy'])->name('pian-app.destroyjeniskelamin'); //delete data jenis kelamin

    //Route Jenis Pegawai
    Route::get('/tableJenisPegawai', [JenisPegawaiController::class, 'index'])->name('pian-app.tablejenispegawai'); //menampilkan daftar jenis pegawai
    Route::get('/formJenisPegawai', [JenisPegawaiController::class, 'create'])->name('pian-app.addjenispegawai'); //menampilkan form tambah jenis pegawai
    Route::post('/prosesaddjenispegawai', [JenisPegawaiController::class, 'store'])->name('pian-app.prosesaddjenispegawai'); //store data jenis pegawai ke database
    Route::get('/jenisPegawai{id}', [JenisPegawaiController::class, 'edit'])->name('pian-app.editjenispegawai'); //menampilkan form edit data jenis pegawai
    Route::put('/tableJenisPegawai/{id}', [JenisPegawaiController::class, 'update'])->name('pian-app.updatejenispegawai'); //update data jenis pegawai
    Route::delete('/tableJenisPegawai/{id}', [JenisPegawaiController::class, 'destroy'])->name('pian-app.destroyjenispegawai'); //delete data jenis pegawai

    //Route Status Pegawai
    Route::get('/tableStatusPegawai', [StatusPegawaiController::class, 'index'])->name('pian-app.tablestatuspegawai'); //menampilkan daftar status pegawai
    Route::get('/formStatusPegawai', [StatusPegawaiController::class, 'create'])->name('pian-app.addstatuspegawai'); //menampilkan form tambah status pegawai
    Route::post('/prosesaddstatuspegawai', [StatusPegawaiController::class, 'store'])->name('pian-app.prosesaddstatuspegawai'); //store data status pegawai ke database
    Route::get('/statusPegawai{id}', [StatusPegawaiController::class, 'edit'])->name('pian-app.editstatuspegawai'); //menampilkan form edit data status pegawai
    Route::put('/tableStatusPegawai/{id}', [StatusPegawaiController::class, 'update'])->name('pian-app.updatestatuspegawai'); //update data status pegawai
    Route::delete('/tableStatusPegawai/{id}', [StatusPegawaiController::class, 'destroy'])->name('pian-app.destroystatuspegawai'); //delete data status pegawai

    //Route Pendidikan
    Route::get('/tablePendidikan', [PendidikanController::class, 'index'])->name('pian-app.tablependidikan'); //menampilkan daftar pendidikan
    Route::post('/prosesaddpendidikan', [PendidikanController::class, 'store'])->name('pian-app.prosesaddpendidikan'); //store data pendidikan ke database
    Route::get('/formPendidikan', [PendidikanController::class, 'create'])->name('pian-app.addpendidikan'); //menampilkan form tambah pendidikan 
    Route::get('/pendidikan{id}', [PendidikanController::class, 'edit'])->name('pian-app.editpendidikan'); //menampilkan form edit data pendidikan
    Route::put('/tablePendidikan/{id}', [PendidikanController::class, 'update'])->name('pian-app.updatependidikan'); //update data pendidikan
    Route::delete('/tablePendidikan/{id}', [PendidikanController::class, 'destroy'])->name('pian-app.destroypendidikan'); //delete data pendidikan

    //Route Agama
    Route::get('/table', [TableController::class, 'index'])->name('pian-app.table')->middleware('auth'); //menampilkan daftar agama
    Route::post('/prosesaddagama', [TableController::class, 'store'])->name('pian-app.prosesaddagama'); //store data agama ke database
    Route::get('/form', [TableController::class, 'create'])->name('pian-app.form'); //menampilkan form tambah agama 
    Route::get('/agama{id}', [TableController::class, 'edit'])->name('pian-app.edit'); //menampilkan form edit data agama
    Route::put('/table/{id}', [TableController::class, 'update'])->name('pian-app.update'); //update data agama
    Route::delete('/table/{id}', [TableController::class, 'destroy'])->name('pian-app.destroy'); //delete data agama

});