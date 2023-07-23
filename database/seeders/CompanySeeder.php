<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('companies')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('companies')->insert([
            'name'          => 'PT. Idham Sapta Perkasa',
            'slug'          => 'pt-idham-sapta-perkasa',
            'logo'          => 'img/logo-pt.webp',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('companies')->insert([
            'name'          => 'CV. Idham  Perkasa',
            'slug'          => 'cv-idham-perkasa',
            'logo'          => 'img/logo-cv.webp',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
