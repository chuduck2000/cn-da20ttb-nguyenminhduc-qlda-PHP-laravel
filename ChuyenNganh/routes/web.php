<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DoanController;
use App\Http\Controllers\DoanNamhocController;
use App\Http\Controllers\GiangvienController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\NamhocController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\UserController;
use App\Models\Sinhvien;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::view('admin', 'admin.trangchu');

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin', [TrangchuController::class, 'trangchu']);

    Route::get('admin/lop/list', [LopController::class, 'list']);
    Route::get('admin/lop/add', [LopController::class, 'add']);
    Route::post('admin/lop/add', [LopController::class, 'insert']);
    Route::get('admin/lop/edit/{id}', [LopController::class, 'edit']);
    Route::post('admin/lop/edit/{id}', [LopController::class, 'update']);
    Route::get('admin/lop/delete/{id}', [LopController::class, 'delete']);

    Route::get('admin/namhoc/list', [NamhocController::class, 'list']);
    Route::get('admin/namhoc/add', [NamhocController::class, 'add']);
    Route::post('admin/namhoc/add', [NamhocController::class, 'insert']);
    Route::get('admin/namhoc/edit/{id}', [NamhocController::class, 'edit']);
    Route::post('admin/namhoc/edit/{id}', [NamhocController::class, 'update']);
    Route::get('admin/namhoc/delete/{id}', [NamhocController::class, 'delete']);

    Route::get('admin/sinhvien/list', [SinhvienController::class, 'list']);
    Route::get('admin/sinhvien/add', [SinhvienController::class, 'add']);
    Route::post('admin/sinhvien/add', [SinhvienController::class, 'insert']);
    Route::get('admin/sinhvien/edit/{id}', [SinhvienController::class, 'edit']);
    Route::post('admin/sinhvien/edit/{id}', [SinhvienController::class, 'update']);
    Route::get('admin/sinhvien/delete/{id}', [SinhvienController::class, 'delete']);

    Route::get('admin/giangvien/list', [GiangvienController::class, 'list']);
    Route::get('admin/giangvien/add', [GiangvienController::class, 'add']);
    Route::post('admin/giangvien/add', [GiangvienController::class, 'insert']);
    Route::get('admin/giangvien/edit/{id}', [GiangvienController::class, 'edit']);
    Route::post('admin/giangvien/edit/{id}', [GiangvienController::class, 'update']);
    Route::get('admin/giangvien/delete/{id}', [GiangvienController::class, 'delete']);
});


Route::group(['middleware' => 'common'], function () {
    Route::get('chat', [ChatController::class, 'chat']);
    Route::post('submit_message', [ChatController::class, 'submit_message']);
});

Route::group(['middleware' => 'giangvien'], function () {
    Route::get('giangvien', [TrangchuController::class, 'trangchu']);
    Route::get('giangvien/doan/list', [DoanController::class, 'list']);
    Route::get('giangvien/doan/add', [DoanController::class, 'add']);
    Route::post('giangvien/doan/add', [DoanController::class, 'insert']);
    Route::get('giangvien/doan/edit/{id}', [DoanController::class, 'edit']);
    Route::post('giangvien/doan/edit/{id}', [DoanController::class, 'update']);
    Route::get('giangvien/doan/delete/{id}', [DoanController::class, 'delete']);

    Route::get('giangvien/doan_namhoc/list', [DoanNamhocController::class, 'list']);
    Route::get('giangvien/doan_namhoc/add', [DoanNamhocController::class, 'add']);
    Route::post('giangvien/doan_namhoc/add', [DoanNamhocController::class, 'insert']);
    Route::get('giangvien/doan_namhoc/edit/{id}', [DoanNamhocController::class, 'edit']);
    Route::post('giangvien/doan_namhoc/edit/{id}', [DoanNamhocController::class, 'update']);
    Route::get('giangvien/doan_namhoc/delete/{id}', [DoanNamhocController::class, 'delete']);

    Route::get('giangvien/view', [UserController::class, 'view']);

    Route::get('giangvien/xem_sinhvien', [SinhvienController::class, 'XemSinhvien']);
});


Route::group(['middleware' => 'sinhvien'], function () {
    Route::get('sinhvien', [TrangchuController::class, 'trangchu']);
    Route::get('sinhvien/view', [UserController::class, 'view']);

    Route::get('sinhvien/xem_giangvien', [GiangvienController::class, 'XemGiangvien']);
    Route::get('sinhvien/xem_doan', [DoanController::class, 'XemDoan']);
});
