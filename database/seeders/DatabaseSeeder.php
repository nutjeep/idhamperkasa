<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'about' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, illo dolore sint explicabo totam hic aut aspernatur quidem, maiores labore, fuga nihil! Quas officia dolore doloribus nemo laborum, perferendis impedit nostrum veritatis obcaecati fuga quod nesciunt unde quo molestiae blanditiis qui molestias nam ullam. Iure, fugiat. Facilis obcaecati nesciunt repudiandae?</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate cumque est quam voluptates delectus, deserunt quae iure maxime voluptas, temporibus, eius fuga. Fuga, aliquid? Expedita ea a corrupti nostrum, error repellendus numquam hic vero quaerat, voluptatibus quas nesciunt doloribus ipsam adipisci maiores quae ducimus nihil animi suscipit cupiditate enim ipsa neque. Veritatis, esse beatae laudantium laboriosam ipsa exercitationem non explicabo quos vero praesentium voluptatum eius dolores odit fugiat, dolor omnis consequuntur perspiciatis sapiente! Quisquam tempore beatae autem tenetur animi suscipit eius reprehenderit assumenda delectus culpa libero excepturi natus mollitia dignissimos iure quidem quam quasi, magni esse ipsam dolor? Asperiores impedit, minima illum soluta voluptas veniam ratione nisi dolorem blanditiis velit cumque voluptatum esse aliquam laudantium tempora ea quisquam explicabo qui.</p>',
            'visi'  => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit expedita minus voluptates quas distinctio? Totam blanditiis aperiam dolores consequuntur temporibus. Eum deleniti vero quasi maxime! Repudiandae, consequuntur nisi sequi recusandae dignissimos cum illo consectetur esse illum, ratione maiores voluptas dolorem. Repellat, delectus eius dicta enim a culpa quibusdam inventore totam.',
            'misi'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos laudantium obcaecati, itaque nemo repellendus atque fugiat eius pariatur assumenda iusto harum perferendis blanditiis, minus debitis nulla quae officiis ab vero.'
        ]); 

        Category::create([
            'name'  => 'Seal',
            'slug'  => 'seal'
        ]);

        Category::create([
            'name'  => 'Safety',
            'slug'  => 'safety'
        ]);

        Category::create([
            'name'  => 'Furniture',
            'slug'  => 'furniture'
        ]);

        Product::create([
            'product_name'  => 'Rod Seal',
            'slug'          => 'rod-seal',
            'category_id'   => 1
        ]);
        Product::create([
            'product_name'  => 'Piston Seal',
            'slug'          => 'piston-seal',
            'category_id'   => 1
        ]);
        Product::create([
            'product_name'  => 'Wiper Seal',
            'slug'          => 'wiper-seal',
            'category_id'   => 1
        ]);

        Product::create([
            'product_name'  => 'Helmet',
            'slug'          => 'helmet',
            'category_id'   => 2
        ]);
        Product::create([
            'product_name'  => 'Fire Jacket',
            'slug'          => 'fire-jacket',
            'category_id'   => 2
        ]);

        Product::create([
            'product_name'  => 'Kitchen set',
            'slug'          => 'kitchen-set',
            'category_id'   => 3
        ]);
        Product::create([
            'product_name'  => 'Chair and table',
            'slug'          => 'chair-and-table',
            'category_id'   => 3
        ]);
    }
}
