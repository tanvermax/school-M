<?php

namespace Database\Factories;

use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentProfile>
 */
class StudentProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(), 
            
            // রোল নম্বর ১০০০ থেকে ৯০০০ এর মধ্যে র্যান্ডম জেনারেট হবে
            'roll_no' => $this->faker->unique()->numberBetween(1000, 9000),
            
            // ক্লাস নেমগুলো যাতে আপনার অ্যাডমিন ক্লাসের সাথে ম্যাচ করে (Class 6 বা Class 9)
            'class_name' => $this->faker->randomElement(['Class 6', 'Class 9']),
            
            'admission_year' => $this->faker->randomElement(['2024', '2025', '2026']),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
