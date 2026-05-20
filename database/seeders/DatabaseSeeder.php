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

    // $studentUser = User::updateOrCreate(
    //         ['email' => 'student@test.com'],
    //         [
    //             'name' => 'Shafayet Student',
    //             'password' => Hash::make('password'),
    //             'role' => 'student',
    //         ]
    //     );

    //     // স্টুডেন্ট প্রোফাইল
    //     StudentProfile::updateOrCreate(
    //         ['user_id' => $studentUser->id],
    //         [
    //             'roll_no' => 101,
    //             'class_name' => 9,
    //             'admission_year' => '2026',
    //             'phone_number' => '01700000000',
    //             'address' => 'Dhaka, Bangladesh',
    //         ]
    //     );

    //     // ২. ৩০০ জন ডামি স্টুডেন্ট (updateOrCreate ব্যবহার করে)
    //     for ($class = 1; $class <= 12; $class++) {
    //         for ($i = 1; $i <= 25; $i++) {
    //             $email = 'student_class_' . $class . '_' . $i . '@school.com';
                
    //             $user = User::updateOrCreate(
    //                 ['email' => $email],
    //                 [
    //                     'name' => 'Student Class ' . $class . ' - ' . $i,
    //                     'password' => Hash::make('password'),
    //                     'role' => 'student',
    //                 ]
    //             );

    //             StudentProfile::updateOrCreate(
    //                 ['user_id' => $user->id],
    //                 [
    //                     'roll_no' => $class * 1000 + $i,
    //                     'class_name' => $class,
    //                     'admission_year' => (string) rand(2020, 2026),
    //                     'phone_number' => '017' . rand(10000000, 99999999),
    //                     'address' => 'Dhaka, Bangladesh',
    //                 ]
    //             );
    //         }
    //     }
    
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

        // ২. লুপ চালিয়ে একসঙ্গে ২০ জন ডামি স্টুডেন্ট তৈরি করা
        for ($i = 1; $i <= 300; $i++) {
            // প্রথমে ইউজার তৈরি হবে যার রোল হবে 'student'
            $user = User::create([
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@school.com',
                'password' => Hash::make('password'), // সবার পাসওয়ার্ড 'password' থাকবে
                'role' => 'student',
            ]);

            // তৈরি হওয়া ইউজারের আইডি নিয়ে তার প্রোফাইল তৈরি হবে
            StudentProfile::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
