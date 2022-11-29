<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (SchoolClass $schoolClass) {
            $schoolClass->students()->saveMany(StudentFactory::new()->count(5)->make([
                'class_id' => $schoolClass->id,
            ]));

            $schoolClass->teachers()->saveMany(TeacherFactory::new()->count(1)->make());
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->regexify('[A-Z]{3}[1-4]{1}[A-F]{1}'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
