<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class regenerateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regenerate:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('User email: s.vanrosendaal@curio.nl');
        $this->info('New User Password: ' . $password . "\n");

        $user = User::where('email', 's.vanrosendaal@curio.nl')->first();
        $user->password = Hash::make($password);
        $user->save();
    }
}
