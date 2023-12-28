<?php

use App\Http\Controllers\Admin\SinhvienController;
use App\Livewire\Auth\LoginComponent;
use App\Livewire\Crud\AddGiangvienComponent;
use App\Livewire\Crud\AddSinhvienComponent;
use App\Livewire\Crud\EditGiangvienComponent;
use App\Livewire\Crud\EditSinhvienComponent;
use App\Livewire\Crud\IndexComponent;
use App\Livewire\Crud\IndexGVComponent;
use App\Livewire\DoanComponent;
use Illuminate\Support\Facades\Route;
use LoginComponent as GlobalLoginComponent;

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
    return redirect('/admin/login');
});


Route::get('admin/sinhvien', IndexComponent::class)->name('sinhvien');
Route::get('admin/giangvien', IndexGVComponent::class)->name('giangvien');

Route::get('admin/them-sinhvien', AddSinhvienComponent::class)->name('addSinhvien');
Route::get('admin/them-giangvien', AddGiangvienComponent::class)->name('addGiangvien');

Route::get('admin/sua-sinhvien/{id}', EditSinhvienComponent::class)->name('editSinhvien');
Route::get('admin/sua-giangvien/{id}', EditGiangvienComponent::class)->name('editGiangvien');


Route::get('doans', DoanComponent::class);

require __DIR__ . '/admin.php';
require __DIR__ . '/sinhvien.php';
require __DIR__ . '/giangvien.php';
