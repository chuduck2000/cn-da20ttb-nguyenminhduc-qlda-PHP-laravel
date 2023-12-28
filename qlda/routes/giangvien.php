<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Giangvien\DashboardComponent;
use App\Livewire\Auth\Giangvien\LoginComponent;
use App\Livewire\Auth\Giangvien\RegistrationComponent;
use App\Livewire\Crud\AddGiangvienComponent;

Route::get('giangvien/login', LoginComponent::class)->middleware('guest:giangvien')->name('giangvien.login');
Route::get('giangvien/addGiangvien', AddGiangvienComponent::class)->middleware('guest:giangvien')->name('giangvien.add-giangvien');

Route::prefix('giangvien/')->name('giangvien.')->middleware('auth:giangvien')->group(function () {
    Route::post('logout', [LogoutController::class, 'giangvienLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
});
