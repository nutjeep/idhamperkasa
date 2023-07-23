<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('company_details')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('company_details')->insert([
            'company_id'    => '1',
            'about'         => 'Deskripsi PT. Idham Sapta Perkasa',
            'visi'          => 'Visi PT. Idham Sapta Perkasa',
            'misi'          => 'Misi PT. Idham Sapta Perkasa',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('company_details')->insert([
            'company_id'    => '2',
            'about'         => 'Deskripsi CV. Idham Perkasa',
            'visi'          => 'Visi CV. Idham Perkasa',
            'misi'          => 'Misi CV. Idham Perkasa',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
