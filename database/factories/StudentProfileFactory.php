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
            'roll_no' => fake()->unique()->numberBetween(1001, 9999),
            'class_name' => fake()->numberBetween(1, 12), // শুধু 1-12 সংখ্যা
            'admission_year' => (string) fake()->numberBetween(2020, 2026),
            'phone_number' => '017' . fake()->numberBetween(10000000, 99999999),
            'address' => fake()->address(),
        ];
    }
}
