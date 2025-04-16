<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HR\EmploymentRecordController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin routes
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/admin/register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('/admin/register', [RegisteredUserController::class, 'store'])->name('register');
});





// Department dashboards (each with its Gate)
Route::get('/hr/dashboard', fn() => view('hr.dashboard'))
    ->middleware(['auth', 'can:is-hr'])
    ->name('hr.dashboard');


Route::middleware(['auth', 'can:is-hr'])->prefix('hr')->name('hr.')->group(function () {
    Route::get('/employment/create', [EmploymentRecordController::class, 'create'])->name('employment.create');
    Route::post('/employment', [EmploymentRecordController::class, 'store'])->name('employment.store');
    Route::get('/employment', [EmploymentRecordController::class, 'index'])->name('employment.index');
    Route::resource('hr/employment', EmploymentRecordController::class)->names('hr.employment');
});


Route::get('/accounting/dashboard', fn() => view('accounting.dashboard'))
    ->middleware(['auth', 'can:is-accounting'])
    ->name('accounting.dashboard');

Route::get('/planning/dashboard', fn() => view('planning.dashboard'))
    ->middleware(['auth', 'can:is-planning'])
    ->name('planning.dashboard');

Route::get('/production/dashboard', fn() => view('production.dashboard'))
    ->middleware(['auth', 'can:is-production'])
    ->name('production.dashboard');

Route::get('/inventory/dashboard', fn() => view('inventory.dashboard'))
    ->middleware(['auth', 'can:is-inventory'])
    ->name('inventory.dashboard');

Route::get('/marketing/dashboard', fn() => view('marketing.dashboard'))
    ->middleware(['auth', 'can:is-marketing'])
    ->name('marketing.dashboard');

Route::get('/reporting/dashboard', fn() => view('reporting.dashboard'))
    ->middleware(['auth', 'can:is-reporting'])
    ->name('reporting.dashboard');

Route::get('/crm/dashboard', fn() => view('crm.dashboard'))
    ->middleware(['auth', 'can:is'])
    ->name('crm.dashboard');

require __DIR__ . '/auth.php';
