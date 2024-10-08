<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userName = fake()->name();
        $user = UserFactory::new()->create([
            'name' => $userName,
            'email' => Str::of($userName)->slug('.').'@curio.nl',
        ]);

        return [
            'user_id' => $user->id,
            'student_number' => 'd'.fake()->numerify('######'),
            'online' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
