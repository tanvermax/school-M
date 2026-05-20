<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Teacher\TeacherProfileController;
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


    Route::get('/dashboard/classes', [SchoolClassController::class, 'index'])->name('classes.index');
    Route::post('/dashboard/classes', [SchoolClassController::class, 'store'])->name('classes.store');
    Route::get('/dashboard/classes/{id}', [SchoolClassController::class, 'show'])->name('classes.show');
});



Route::middleware(['auth'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.teacher'); // ভিউ ফাইল: resources/views/dashboard/teacher.blade.php
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard.teacher'); // ভিউ ফাইল: resources/views/dashboard/teacher.blade.php
    })->name('dashboard');


    Route::get('/dashboard/teacherprofile', [TeacherProfileController::class, 'index'])->name('teacherprofile');
    Route::post('/dashboard/teacherprofile', [TeacherProfileController::class, 'store'])->name('teacherprofile.store');
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

require __DIR__ . '/auth.php';
