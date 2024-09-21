<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Illuminate\Database\Seeder;

//class ProductSeeder extends Seeder
//{
    /**
     * Run the database seeds.
     */
    //public function run(): void
    //{
        //
   // }
//}
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'title' => 'FRUIT PIZZA',
            'short_description' => 'This is a special receipe pizza.',
            'full_description' => 'This pizza smoulders from toughly bumbly baked kitchens...',
            'price' => 23.99,
            'quantity' => 10,
            'image_path' => '/public/storage/images/products/product-2.jpg',
            'image_name' => 'fruit pizza',
            'category' => 'pizza',
        ]);

        Product::create([
            'title' => 'NEW YORK PIZZA',
            'short_description' => 'This is a special receipe pizza.',
            'full_description' => 'This pizza smoulders from toughly bumbly baked kitchens...',
            'price' => 19.99,
            'quantity' => 10,
            'image_path' => '/public/storage/images/products/product-1.jpg',
            'image_name' => 'fruit pizza',
            'category' => 'pizza',
        ]);

        Product::create([
            'title' => 'DETROIT PIZZA',
            'short_description' => 'This is a special receipe pizza.',
            'full_description' => 'This pizza smoulders from toughly bumbly baked kitchens...',
            'price' => 9.99,
            'quantity' => 10,
            'image_path' => '/public/storage/images/products/product-3.jpg',
            'image_name' => 'fruit pizza',
            'category' => 'pizza',
        ]);

        Product::create([
            'title' => 'SICILLIAN PIZZA',
            'short_description' => 'This is a special receipe pizza.',
            'full_description' => 'This pizza smoulders from toughly bumbly baked kitchens...',
            'price' => 20.99,
            'quantity' => 10,
            'image_path' => '/public/storage/images/products/product-4.jpg',
            'image_name' => 'fruit pizza',
            'category' => 'pizza',
            ]);

        Product::create([
            'title' => 'NEAPOLITAN PIZZA',
            'short_description' => 'This is a special receipe pizza.',
            'full_description' => 'This pizza smoulders from toughly bumbly baked kitchens...',
            'price' => 6.99,
            'quantity' => 10,
            'image_path' => '/public/storage/images/products/product-5.jpg',
            'image_name' => 'fruit pizza',
            'category' => 'pizza',
        ]);
    }
}

