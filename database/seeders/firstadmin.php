<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class firstadmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create($this->admindata());
    }

    private function admindata(){
        return [
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456'),
            'email_verified_at'=>Carbon::now(),
        ];
    }
}