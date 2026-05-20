<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function index()
    {
        // ক্লাসগুলোর সাথে তাদের টিচার এবং স্টুডেন্ট কাউন্ট একবারে নিয়ে আসা
        $classes = SchoolClass::with('teacher')->withCount('students')->get();
        
        // ড্রপডাউনে দেখানোর জন্য শুধু শিক্ষক এবং অ্যাডমিনদের লিস্ট আনা
        $teachers = User::whereIn('role', ['teacher', 'admin'])->get(); 

        return view('dashboard.admin.attendance-assign', compact('classes', 'teachers'));
    }

    // ২. নতুন ক্লাস তৈরি এবং টিচার অ্যাসাইন করার লজিক
   public function assignTeacher(Request $request, $id)
    {
        // টিচার আইডি ভ্যালিডেশন (nullable রাখছি যাতে চাইলে টিচার রিমুভও করা যায়)
        $request->validate([
            'teacher_id' => 'nullable|exists:users,id', 
        ]);

        // ইউআরএল এর আইডি দিয়ে ক্লাসটি খুঁজে বের করা
        $class = SchoolClass::findOrFail($id);

        // ওই নির্দিষ্ট ক্লাসের teacher_id কলামটি আপডেট করা
        $class->update([
            'teacher_id' => $request->teacher_id
        ]);

        return redirect()->back()->with('success', "'{$class->class_name}' ক্লাসের জন্য সফলভাবে শিক্ষক অ্যাসাইন করা হয়েছে!");
    }

    public function show($id)
    {
        $class = SchoolClass::findOrFail($id);
        
        $students = \App\Models\StudentProfile::with('user')
            ->where('class_name', $class->class_name)
            ->get();

        return view('admin.classes.show', compact('class', 'students'));
    }

    
}
