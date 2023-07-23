<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'username'      => 'Salman',
            'email'         => 'salman@gmail.com',
            'password'      => bcrypt('admin123'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('users')->insert([
            'username'      => 'Developer',
            'email'         => 'developer@gmail.com',
            'password'      => bcrypt('@Abdulloh02'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
