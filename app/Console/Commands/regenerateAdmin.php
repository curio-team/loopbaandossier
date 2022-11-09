<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class regenerateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regenerate:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerates the admin password and posts it to console';

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
        $this->info('New Admin Password: ' . $password . "\n");

        $adminUser = User::where('email', 'admin@curio.nl')->first();
        $adminUser->password = Hash::make($password);
        $adminUser->save();
    }
}
