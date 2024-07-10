<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = fake()->company();
        return [
            'name' => $company,
            'slug' => Str::slug($company),
            'slogan' => fake()->catchPhrase(),
            'address' => fake()->address(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'email' => fake()->companyEmail(),
            'phone_number' => fake()->phoneNumber(),
            'website_url' => fake()->url(),
            'short_code' => strtoupper(substr(fake()->unique()->word(), 0, 3))

        ];
    }
}
