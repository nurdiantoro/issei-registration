<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barcode' => fake()->unique()->numerify('########'), // 8 digit acak
            'salutation' => fake()->title($gender = null | 'male' | 'female'),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role_id' => 'user',
            'telephone' => fake()->phoneNumber(),
            'company' => fake()->company(),
            'job' => fake()->words(),
            'password' => bcrypt('password'), // default password, walau kamu mungkin tidak pakai
            'remember_token' => Str::random(10),
        ];
    }
}
