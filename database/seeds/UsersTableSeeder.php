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
            'foto' => '1618817127.png',
            'jabatan'  => 'admin',
            'remember_token' => bcrypt('secret')
    ]);
    }
}
