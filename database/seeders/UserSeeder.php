<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\User;
use App\Models\Student;
use Database\Factories\StudentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Database\Factories\TeacherFactory;
use Database\Factories\PageFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = SchoolClass::all();

        // CREATE ADMIN

        $password = Str::random(32);
        $this->command->info('Admin email: admin@curio.nl');
        $this->command->info('New Admin Password: '.$password);
        $this->command->info('');

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@curio.nl',
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $password = Str::random(32);
        $this->command->info('Teacher email: teacher@curio.nl');
        $this->command->info('New Teacher Password: '.$password);
        $this->command->info('');

        // CREATE TEACHER

        $teacherUser = User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@curio.nl',
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $teacher = TeacherFactory::new()->create(['user_id' => $teacherUser->id]);

        foreach ($classes as $class) {
            $class->teachers()->attach($teacher);
        }

        // CREATE STUDENT

        $password = Str::random(32);
        $this->command->info('User email: s.vanrosendaal@curio.nl');
        $this->command->info('New User Password: '.$password);

        $studentUser = User::factory()->create([
            'name' => 'Steven van Rosendaal',
            'email' => 's.vanrosendaal@curio.nl',
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $student = $studentUser->student()->save(StudentFactory::new()->create([
            'class_id' => $classes->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]));

        $student->pages()->save(PageFactory::new()->create(['student_id' => $student->id]));
    }
}
