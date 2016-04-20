<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'Mirigan',
                    'email' => 'emilien.billard@gmail.com',
                    'password' => bcrypt('secret'),
                    'admin' => true
                ]
            ]
        );
    }
}
