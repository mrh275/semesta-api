<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\KelasController;
use App\Http\Controllers\API\BiodataController;
use App\Http\Controllers\API\DaftarPelanggaranController;
use App\Http\Controllers\API\PeraturanController;

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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'fetch']);

    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas', [KelasController::class, 'getKelas']);

    Route::get('/siswa', [BiodataController::class, 'getAllSiswa']);

    Route::post('/bk/tambah-kategori-peraturan', [PeraturanController::class, 'addCategoryPeraturan']);
    Route::get('/bk/kategori-peraturan', [PeraturanController::class, 'allCategory']);

    Route::post('/bk/tambah-peraturan', [PeraturanController::class, 'addPeraturan']);
    Route::get('/bk/peraturan', [PeraturanController::class, 'allPeraturan']);

    Route::post('/bk/tambah-pelanggaran', [DaftarPelanggaranController::class, 'addPelanggaran']);
});
