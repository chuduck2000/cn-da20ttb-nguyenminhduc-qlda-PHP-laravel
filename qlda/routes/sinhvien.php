<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Sinhvien\DashboardComponent;
use App\Livewire\Auth\Sinhvien\LoginComponent;
use App\Livewire\Auth\Sinhvien\RegistrationComponent;
use App\Livewire\Crud\AddSinhvienComponent;

Route::get('sinhvien/login', LoginComponent::class)->middleware('guest:sinhvien')->name('sinhvien.login');
Route::get('sinhvien/addSinhvien', AddSinhvienComponent::class)->middleware('guest:sinhvien')->name('sinhvien.add-sinhvien');

Route::prefix('sinhvien/')->name('sinhvien.')->middleware('auth:sinhvien')->group(function () {
    Route::post('logout', [LogoutController::class, 'sinhvienLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
});
