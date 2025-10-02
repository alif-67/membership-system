<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Manager\ReportController;
use App\Http\Controllers\Staff\ApprovalController;
use App\Http\Controllers\Member\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
    });

    Route::middleware(['role:manager'])->group(function () {
        Route::get('/manager', [ReportController::class, 'index'])->name('manager.reports');
    });

    Route::middleware(['role:staff'])->group(function () {
        Route::get('/staff', [ApprovalController::class, 'index'])->name('staff.approvals');
    });

    Route::middleware(['role:member'])->group(function () {
        Route::get('/member', [ProfileController::class, 'index'])->name('member.profile');
    });
});

require __DIR__.'/auth.php';
