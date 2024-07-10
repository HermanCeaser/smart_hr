<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);
        static $nextStaffNo = 2;
        return [
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName($gender),
            'dob' => fake()->date(),
            'date_of_joining' => now()->subYear(1),
            'tenant_id' => random_int(1, 4),
            'gender' => $gender,
            'employee_id' => 'META'.Carbon::now()->subYear(2)->format('y'). 'EMP-' .sprintf('%04d', $nextStaffNo++),
            'department_id' => rand(1, 7),
            'designation_id' => rand(1, 7),
            'phone_number' => fake()->e164PhoneNumber(),
            'local_address' => fake()->streetAddress(),
            'permanent_address' => fake()->address(),
            'basic_salary' => random_int(1000000, 5000000),

        ];
    }
}
