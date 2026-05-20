<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    //
    public function index()
    {
        $classes = SchoolClass::withCount('students')->get(); // সাথে কয়জন স্টুডেন্ট আছে তাও কাউন্ট করবে
        return view('dashboard.admin.classes.index', compact('classes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'subject_name' => 'required|string|max:255',
            'section' => 'nullable|string|max:255',
        ]);

        SchoolClass::create($request->all());

        return redirect()->back()->with('success', 'Class created successfully!');
    }

    // কোনো নির্দিষ্ট ক্লাসে ক্লিক করলে তার ভেতরের সব স্টুডেন্ট দেখার জন্য
    public function show($id)
    {
        // ক্লাসটি খুঁজে বের করবে এবং তার সাথে ম্যাচিং স্টুডেন্টদের (ইউজার টেবিলসহ) নিয়ে আসবে
        $class = SchoolClass::with('students.user')->findOrFail($id);
        
        return view('dashboard.admin.classes.show', compact('class'));
    }
}
