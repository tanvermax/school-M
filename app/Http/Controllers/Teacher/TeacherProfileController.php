<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeacherProfileController extends Controller
{
    //

    public function index(): View
    {
        $user = Auth::user();
        $profile = $user->teacherProfile; 

        // আপনার ফোল্ডার স্ট্রাকচার অনুযায়ী ভিউ পাথ
        return view('dashboard.teacher.teacher-profile', compact('user', 'profile'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Auth::user()->teacherProfile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only(['designation', 'department', 'qualification', 'joining_date', 'phone_number', 'address'])
        );

        return redirect()->back()->with('success', 'Teacher profile updated successfully!');
    }
}
