<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\About;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'  => 'Admin',
            'password'  => bcrypt('idhamperkasa')
        ]);
        
        About::create([
            'about' => 'CV. IDHAM PERKASA sebagai perusahaan yang bergerak di bidang Rubber Product Manufacturing (Seal, Anti Slip Pallet, Membran, dll). Dengan didukung oleh sumber daya manusia yang berpengalaman, ditunjang dengan mesin cetak & CNC modern. Selain manufaktur Rubber Product, CV. IDHAM PERKASA memiliki stock barang penjualan seperti Seal NOK, TTO, CHO, NTK, dll.',
            'company' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, illo dolore sint explicabo totam hic aut aspernatur quidem, maiores labore, fuga nihil! Quas officia dolore doloribus nemo laborum, perferendis impedit nostrum veritatis obcaecati fuga quod nesciunt unde quo molestiae blanditiis qui molestias nam ullam. Iure, fugiat. Facilis obcaecati nesciunt repudiandae?',
            'visi'  => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit expedita minus voluptates quas distinctio? Totam blanditiis aperiam dolores consequuntur temporibus. Eum deleniti vero quasi maxime! Repudiandae, consequuntur nisi sequi recusandae dignissimos cum illo consectetur esse illum, ratione maiores voluptas dolorem. Repellat, delectus eius dicta enim a culpa quibusdam inventore totam.',
            'misi'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos laudantium obcaecati, itaque nemo repellendus atque fugiat eius pariatur assumenda iusto harum perferendis blanditiis, minus debitis nulla quae officiis ab vero.'
        ]); 

        Category::create([
            'category_name'  => 'Seal',
        ]);
        Category::create([
            'category_name'  => 'Safety',
        ]);
        Category::create([
            'category_name'  => 'Iron',
        ]);

        // Category::create([
        //     'category_name'  => 'Furniture',
        // ]);

        // Product::create([
        //     'product_name'  => 'Rod Seal',
        //     'slug'          => 'rod-seal',
        //     'category_id'   => 1
        // ]);
        // Product::create([
        //     'product_name'  => 'Piston Seal',
        //     'slug'          => 'piston-seal',
        //     'category_id'   => 1
        // ]);
        // Product::create([
        //     'product_name'  => 'Wiper Seal',
        //     'slug'          => 'wiper-seal',
        //     'category_id'   => 1
        // ]);

        // Product::create([
        //     'product_name'  => 'Helmet',
        //     'slug'          => 'helmet',
        //     'category_id'   => 2
        // ]);
        // Product::create([
        //     'product_name'  => 'Fire Jacket',
        //     'slug'          => 'fire-jacket',
        //     'category_id'   => 2
        // ]);

        // Product::create([
        //     'product_name'  => 'Kitchen set',
        //     'slug'          => 'kitchen-set',
        //     'category_id'   => 3
        // ]);
        // Product::create([
        //     'product_name'  => 'Chair and table',
        //     'slug'          => 'chair-and-table',
        //     'category_id'   => 3
        // ]);
    }
}
