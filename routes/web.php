<?php

use App\Http\Livewire\DetailsChartOfAccount;
use App\Http\Livewire\PermissionEdit;
use App\Http\Livewire\RoleCreate;
use App\Http\Livewire\RoleEdit;
use App\Http\Livewire\Roles;
use App\Http\Livewire\SetupPage;
use App\Http\Livewire\UserCreate;
use App\Http\Livewire\UserEdit;
use App\Http\Livewire\UserForm;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', fn() => view('dashboard'))->name('dashboard');
    });
    Route::prefix('setup')->group(function () {
        Route::get('/', SetupPage::class)->name('setup');
    });
    Route::prefix('details/coa')->group(function () {
        Route::get('/{id}', DetailsChartOfAccount::class)->name('chart.of.account');
    });
    Route::prefix('manage-users')->group(function () {
        Route::get('/users', fn() => view('users'))->name('users');
        Route::get('/user/edit/{user}', UserEdit::class)->name('user.edit');
        Route::get('/user/create', UserCreate::class)->name('user.create');
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', Roles::class)->name('roles');
        Route::get('/edit/{role}', RoleEdit::class)->name('role.edit');
        Route::get('/create', RoleCreate::class)->name('role.create');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/edit/{role}', PermissionEdit::class)->name('permission.edit');
    });
});
