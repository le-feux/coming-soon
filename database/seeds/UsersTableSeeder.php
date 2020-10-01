<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'             => 'Super ADMIN',
            'role'             => 'SuperAdmin',
            'email'            => 'admin@admin.com',
            'password'         => sha1('Admin123'),
            'first_connection' => '0'
        ]);
    }
}
