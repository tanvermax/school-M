<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    $classesData = [
            ['class_name' => 'Class 6', 'subject_name' => 'Bangla', 'section' => 'A'],
            ['class_name' => 'Class 6', 'subject_name' => 'English', 'section' => 'A'],
            ['class_name' => 'Class 9', 'subject_name' => 'Math', 'section' => 'Science'],
            ['class_name' => 'Class 9', 'subject_name' => 'Physics', 'section' => 'Science'],
        ];

        foreach ($classesData as $class) {
            SchoolClass::updateOrCreate(
                ['class_name' => $class['class_name'], 'subject_name' => $class['subject_name']], 
                ['section' => $class['section']]
            );
        }
        $studentsWithoutProfile = User::where('role', 'student')->get();
       foreach ($studentsWithoutProfile as $student) {
    

$rollCounter = 1001;
    // র্যান্ডমলি ৪টি ক্লাসের যেকোনো একটিতে স্টুডেন্টকে অ্যাসাইন করা হবে (হুবহু ড্রপডাউনের বানানের সাথে মিলিয়ে)
    $randomClass = fake()->randomElement(['Class 5', 'Class 6', 'Class 7', 'Class 9']);

    StudentProfile::updateOrCreate(
        ['user_id' => $student->id],
        [
            'roll_no'        => $rollCounter++,
            'class_name'     => $randomClass, // এখানে এখন 'Class 5', 'Class 6' ইত্যাদি পারফেক্টলি বসবে
            'admission_year' => '2026',
            'phone_number'   => '017' . rand(10000000, 99999999),
            'address'        => 'Dhaka, Bangladesh',
        ]
    );
}
        // User::factory(10)->create();
        // $studentUser = User::create([
        //     'name' => 'Shafayet Student',
        //     'email' => 'student@test.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'student',
        // ]);

        // StudentProfile::create([
        //     'user_id' => $studentUser->id,
        //     'roll_no' => '101',
        //     'class_name' => 'Class 9', // আপনার তৈরি করা অ্যাডমিন ক্লাসের সাথে ম্যাচ করবে
        //     'admission_year' => '2026',
        //     'phone_number' => '01700000000',
        //     'address' => 'Dhaka, Bangladesh',
        // ]);

        // // ২. লুপ চালিয়ে একসঙ্গে ২০ জন ডামি স্টুডেন্ট তৈরি করা
        // for ($i = 1; $i <= 300; $i++) {
        //     // প্রথমে ইউজার তৈরি হবে যার রোল হবে 'student'
        //     $user = User::create([
        //         'name' => 'Student ' . $i,
        //         'email' => 'student' . $i . '@school.com',
        //         'password' => Hash::make('password'), // সবার পাসওয়ার্ড 'password' থাকবে
        //         'role' => 'student',
        //     ]);

        //     // তৈরি হওয়া ইউজারের আইডি নিয়ে তার প্রোফাইল তৈরি হবে
        //     StudentProfile::factory()->create([
        //         'user_id' => $user->id,
        //     ]);
        // }
    }
}
