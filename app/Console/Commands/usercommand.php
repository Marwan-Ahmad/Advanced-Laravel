<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class usercommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:usercommand {--verified}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'count of user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if($this->option('verified')){
            echo User::query()->where('email_verified_at','!=',null)->count();
        }
        else{
            echo User::query()->count();
        }

    }
}
