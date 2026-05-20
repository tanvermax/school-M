<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $role = Auth::user()->role;
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'teacher') {
        return redirect()->route('teacher.dashboard');
    } else {
        return redirect()->route('student.dashboard');
    }
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.admin'); // ভিউ ফাইল: resources/views/dashboard/admin.blade.php
    })->name('dashboard');

    Route::get('/dashboard/student', [AdminDashboardController::class, 'allstudent'])->name('allstudent');


    Route::get('/dashboard/teacher', [AdminDashboardController::class, 'allteacher'])->name('allteacher');



});
Route::middleware(['auth'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.teacher'); // ভিউ ফাইল: resources/views/dashboard/teacher.blade.php
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard.teacher'); // ভিউ ফাইল: resources/views/dashboard/teacher.blade.php
    })->name('dashboard');
});

// ==========================================
// ৩. শিক্ষার্থী রাউট গ্রুপ (Student Routes)
// ==========================================
Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.student'); // ভিউ ফাইল: resources/views/dashboard/student.blade.php
    })->name('dashboard');

    
Route::get('/dashboard/studentprofile', [StudentProfileController::class, 'index'])->name('studentprofile');
Route::post('/dashboard/studentprofile', [StudentProfileController::class, 'store'])->name('studentprofile.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
