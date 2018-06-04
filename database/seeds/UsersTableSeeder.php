<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'      => 'Shahnawaz Khan',
            'email'     => 'mskh@jeebley.com',
            'password'  => Hash::make('123456'),
            'first_name' =>'Shahnawaz',
            'last_name'  =>'Khan',
            'phone' =>'98765566',
            'admin' =>1
        ]);
        User::create([
            'name'      => 'Midhun Kh',
            'email'     => 'midh@jeebley.com',
            'password'  => Hash::make('123456'),
            'first_name' =>'Midhun',
            'last_name'  =>'Kh',
            'phone' =>'98765566',
            'admin' =>0
        ]);
    }
}
