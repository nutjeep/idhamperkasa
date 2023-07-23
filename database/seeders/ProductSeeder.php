<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // ======== PT Idham Sapta Perkasa ========
        DB::table('products')->insert([
            'category_id'   => '1',
            'company_id'    => '1',
            'name'          => 'Rod Seal',
            'slug'          => 'rod-seal',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('products')->insert([
            'category_id'   => '1',
            'company_id'    => '1',
            'name'          => 'Wiper Seal',
            'slug'          => 'wiper-seal',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('products')->insert([
            'category_id'   => '1',
            'company_id'    => '1',
            'name'          => 'Helmet',
            'slug'          => 'helmet',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // ======== CV Idham Perkasa ========
        DB::table('products')->insert([
            'category_id'   => '2',
            'company_id'    => '2',
            'name'          => 'Kitchen Table',
            'slug'          => 'kitchen-table',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        
        DB::table('products')->insert([
            'category_id'   => '2',
            'company_id'    => '2',
            'name'          => 'Cupboard',
            'slug'          => 'cupboard',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
