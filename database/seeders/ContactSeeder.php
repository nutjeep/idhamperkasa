<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('contacts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('contacts')->insert([
            'city'          => 'Surabaya',
            'phone'         => '0813 5772 4558 | 0812 2547 4891',
            'email'         => 'surabaya@idhamperkasa.com',
            'address'       => 'Jl. Simolawang Blok 1 No.23, Simokerto, Kec. Simokerto Kota Surabaya, Jawa Timur 60144',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
