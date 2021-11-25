<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SigninSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['username'=>'leni', 'fullname'=>'Leni Robs', 'password'=>'leni'],
            ['username'=>'pacq', 'fullname'=>'Money Paks', 'password'=>'money'],
            ['username'=>'test', 'fullname'=>'Test Only', 'password'=>'test'],
          ];
          DB::table('users')->insert($users);
    }
}
