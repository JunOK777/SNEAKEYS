<?php

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $param = [
            'name' => 'a',
            'email' => 'a@a.com',
            'avatar' => 'A.jpg',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10)
        ];
        DB::table('users')->insert($param);

        $param = [
        	'name' => 'b',
        	'email' => 'b@b.com',
            'avatar' => 'B.png',
        	'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10)
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'c',
            'email' => 'c@c.com',
            'avatar' => 'C.jpeg',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10)
        ];
        DB::table('users')->insert($param);

    }
}
