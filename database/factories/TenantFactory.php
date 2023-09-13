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

        return [
            'name' => fake()->company(),
            'slug' => Str::slug(fake()->company()),
            'slogan' => fake()->catchPhrase(),
            'address' => fake()->address(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'email' => fake()->companyEmail(),
            'phone_number' => fake()->phoneNumber(),
            'website_url' => fake()->url(),

        ];
    }
}
