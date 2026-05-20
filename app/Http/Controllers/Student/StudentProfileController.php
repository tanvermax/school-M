<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentProfileController extends Controller
{
    //

    public function index(): View
    {
        $user = Auth::user();
        // ইউজারের অলরেডি প্রোফাইল তৈরি করা আছে কিনা তা লোড করা হচ্ছে
        $profile = $user->studentProfile; 

        return view('dashboard.student.student-profile', compact('user', 'profile'));
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'roll_no' => 'required|integer',
            'admission_year' => 'required|integer|min:2000|max:'.date('Y'),
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        // আপডেট অথবা ইনসার্ট (updateOrCreate) লজিক
        Auth::user()->studentProfile()->updateOrCreate(
            ['user_id' => Auth::id()], // এই আইডির প্রোফাইল খুঁজবে
            $request->only(['class_name', 'roll_no', 'admission_year', 'phone_number', 'address']) // এই ডেটাগুলো ইনসার্ট/আপডেট করবে
        );

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
