<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('categories')->insert([
            'name'          => 'Seal',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Safety',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
