<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Auth\Admin\LoginComponent;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', LoginComponent::class)->middleware('guest:admin')->name('admin.login');

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('', DashboardComponent::class)->name('dashboard');
});
