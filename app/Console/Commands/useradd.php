<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class useradd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:useradd {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 0; $i < $this->argument('count');$i++){
            User::factory()->create();
        }
        echo 'user created successfuly';
    }
}
