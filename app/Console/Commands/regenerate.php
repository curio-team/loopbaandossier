<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class regenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regenerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerates the default user and admin password and posts it to console';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $password = Str::random(32);
        $this->info('Admin email: admin@curio.nl');
        $this->info('New Admin Password: ' . $password. "\n");

        $adminUser = User::where('email', 'admin@curio.nl')->first();
        $adminUser->password = Hash::make($password);
        $adminUser->save();

        $password = Str::random(32);
        $this->info('Teacher email: teacher@curio.nl');
        $this->info('New Teacher Password: ' .$password. "\n");

        $teacher = User::where('email', 'teacher@curio.nl')->first();
        $teacher->password = Hash::make($password);
        $teacher->save();

        $password = Str::random(32);
        $this->info('User email: s.vanrosendaal@curio.nl');
        $this->info('New User Password: ' .$password);

        $user = User::where('email', 's.vanrosendaal@curio.nl')->first();
        $user->password = Hash::make($password);
        $user->save();
    }
}
