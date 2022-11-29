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
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Student $student) {
            $student->pages()->save(Page::factory()->makeOne());
        });
    }

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
            'slug' => Str::of($userName)->slug(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}