<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\TeacherAttendanceController;
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
    
    // ১. অ্যাডমিন প্রধান ড্যাশবোর্ড
    Route::get('/dashboard', function () {
        return view('dashboard.admin'); 
    })->name('dashboard');

    // ২. স্টুডেন্ট ও টিচার লিস্ট দেখার রাউট
    Route::get('/dashboard/student', [AdminDashboardController::class, 'allstudent'])->name('allstudent');
    Route::get('/dashboard/teacher', [AdminDashboardController::class, 'allteacher'])->name('allteacher');

    // ৩. ক্লাস তৈরি ও দেখার রাউট (SchoolClassController)
    Route::get('/dashboard/classes', [SchoolClassController::class, 'index'])->name('classes.index');
    Route::post('/dashboard/classes', [SchoolClassController::class, 'store'])->name('classes.store');
    Route::get('/dashboard/classes/{id}', [SchoolClassController::class, 'show'])->name('classes.show');

    // ৪. টিচার অ্যাসাইন / অ্যাটেনডেন্স ম্যানেজমেন্ট (ClassController)
    // এখানে বানান ঠিক করা হয়েছে এবং ডুপ্লিকেট রাউট বাদ দেওয়া হয়েছে
    Route::get('/dashboard/attendance-assign', [ClassController::class, 'index'])->name('attendance.index');
Route::post('/dashboard/attendance-assign/{id}', [ClassController::class, 'assignTeacher'])->name('attendance.assign.update');
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

    Route::get('/dashboard/teacher/attendance', [TeacherAttendanceController::class, 'index'])->name('teacherattendance');
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
