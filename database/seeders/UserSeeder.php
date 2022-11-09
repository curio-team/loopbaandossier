<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $password = Str::random(32);
        $this->command->info('Admin email: admin@curio.nl');
        $this->command->info('New Admin Password: '.$password);

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
        $this->command->info('User email: s.vanrosendaal@curio.nl');
        $this->command->info('New User Password: '.$password);

        User::factory()->create([
            'name' => 'Steven van Rosendaal',
            'email' => 's.vanrosendaal@curio.nl',
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
