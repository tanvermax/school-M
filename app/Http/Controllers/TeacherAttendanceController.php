<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAttendanceController extends Controller
{
    //
    public function index()
    {
        // ১. বর্তমানে লগইন করা শিক্ষকের আইডি নেওয়া
        $teacherId = Auth::id();

        // ২. শুধুমাত্র এই শিক্ষকের সাথে অ্যাসাইন করা ক্লাসগুলো ডাটাবেজ থেকে আনা
        // সাথে স্টুডেন্ট কাউন্টও একবারে নিয়ে আসা
        $assignedClasses = SchoolClass::where('teacher_id', $teacherId)
            ->withCount('students')
            ->get();

        // ৩. ভিউ ফাইলে ডেটা পাঠানো
        return view('dashboard.teacher.attendance.index', compact('assignedClasses'));
    }
}
