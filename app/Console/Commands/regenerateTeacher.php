<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class regenerateTeacher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regenerate:teacher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (App::environment(['local', 'staging'])) {
            $password = Str::random(32);
            $this->info('Teacher email: teacher@curio.nl');
            $this->info('New Teacher Password: ' . $password . "\n");

            $user = User::where('email', 'teacher@curio.nl')->first();
            $user->password = Hash::make($password);
            $user->save();
        } else {
            $this->error('This command can only be run in a local or staging environment');
        }
    }
}
