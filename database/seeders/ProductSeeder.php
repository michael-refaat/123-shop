<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//using Product model
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding sample data in products table


        //sample data nested inside one array ($products)
        $products = [
            ['name' => 'Product 1', 'category' => '1 - 4', 'image' => 'images\1.png', 'price' => 5, 'stock' => 2],
            ['name' => 'Product 2', 'category' => '1 - 4', 'image' => 'images\2.png', 'price' => 12, 'stock' => 3],
            ['name' => 'Product 3', 'category' => '1 - 4', 'image' => 'images\3.png', 'price' => 15, 'stock' => 1],
            ['name' => 'Product 4', 'category' => '1 - 4', 'image' => 'images\4.png', 'price' => 20, 'stock' => 0],
            ['name' => 'Product 5', 'category' => '5 - 8', 'image' => 'images\5.png', 'price' => 35, 'stock' => 3],
            ['name' => 'Product 6', 'category' => '5 - 8', 'image' => 'images\6.png', 'price' => 26, 'stock' => 0],
            ['name' => 'Product 7', 'category' => '5 - 8', 'image' => 'images\7.png', 'price' => 28, 'stock' => 2],
            ['name' => 'Product 8', 'category' => '5 - 8', 'image' => 'images\8.png', 'price' => 40, 'stock' => 1],
            ['name' => 'Product 9', 'category' => '9 - 12', 'image' => 'images\9.png', 'price' => 55.99, 'stock' => 3],
            ['name' => 'Product 10', 'category' => '9 - 12', 'image' => 'images\10.png', 'price' => 20.70, 'stock' => 0],
            ['name' => 'Product 11', 'category' => '9 - 12', 'image' => 'images\11.png', 'price' => 11.99, 'stock' => 8],
            ['name' => 'Product 12', 'category' => '9 - 12', 'image' => 'images\12.png', 'price' => 35.50, 'stock' => 1],
            ['name' => 'Product 13', 'category' => '13 - 16', 'image' => 'images\13.png', 'price' => 22.90, 'stock' => 4],
            ['name' => 'Product 14', 'category' => '13 - 16', 'image' => 'images\14.png', 'price' => 35.60, 'stock' => 2],
            ['name' => 'Product 15', 'category' => '13 - 16', 'image' => 'images\15.png', 'price' => 78.99, 'stock' => 0],
            ['name' => 'Product 16', 'category' => '13 - 16', 'image' => 'images\16.png', 'price' => 12.50, 'stock' => 1],
            ['name' => 'Product 17', 'category' => '17 - 20', 'image' => 'images\17.png', 'price' => 93.12, 'stock' => 6],
            ['name' => 'Product 18', 'category' => '17 - 20', 'image' => 'images\18.png', 'price' => 13.67, 'stock' => 0],
            ['name' => 'Product 19', 'category' => '17 - 20', 'image' => 'images\19.png', 'price' => 15.99, 'stock' => 1],
            ['name' => 'Product 20', 'category' => '17 - 20', 'image' => 'images\20.png', 'price' => 20.50, 'stock' => 4],
        ];

        //looping through each nested array
        foreach ($products as $product) {
            
            //seeding data in products table
            $record = new Product();

            $record->name = $product['name'];
            $record->category = $product['category'];
            $record->image = $product['image'];
            $record->price = $product['price'];
            $record->stock = $product['stock'];
            
            $record->save();
        }
    }
}
