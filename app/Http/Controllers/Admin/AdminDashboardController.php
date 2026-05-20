<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    //
    public function allstudent(): View
    {
        // রোল যাদের student, তাদের লেটেস্ট ডেটা তুলে আনা হচ্ছে
        $students = User::where('role', 'student')->latest()->get();

        // ড্যাশবোর্ড ভিউতে স্টুডেন্ট লিস্ট পাঠিয়ে দেওয়া হচ্ছে
        return view('dashboard.admin.admin-student', compact('students'));
    }

    public function allteacher(): View
    {
        // রোল যাদের teacher, তাদের ডেটা তুলে আনা হচ্ছে
        $teachers = User::where('role', 'teacher')->latest()->get();

        // আলাদা ব্লেড ফাইলে ডেটা পাঠানো হচ্ছে
        return view('dashboard.admin.admin-teachers', compact('teachers'));
    }
}
