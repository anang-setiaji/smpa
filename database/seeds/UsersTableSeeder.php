<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'  => 'admin',
            'email' => 'admin',
            'password'  => bcrypt('secret'),
            'jabatan'  => 'admin',
            'remember_token' => bcrypt('secret')
    ]);
    }
}
