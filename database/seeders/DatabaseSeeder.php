<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CompanyDetailSeeder;
use Database\Seeders\ProductDetailSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            // ProductSeeder::class,
            CompanySeeder::class,
            CompanyDetailSeeder::class,
            ContactSeeder::class,
            UserSeeder::class,
        ]);
    }
}
