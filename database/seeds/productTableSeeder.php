<?php

use Illuminate\Database\Seeder;
use App\Product;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new App\Product([
            'image_path'=>'/storage/images/ava4.jpg',
            'title'=>'Harry Potter Book 1',
            'description'=>'Cool Harry Potter Book 1 series',
            'price'=>40,
        ]);
        $product->save();
   
        $product = new App\Product([
           'image_path'=>'/storage/images/ava5.jpg',
           'title'=>'Harry Potter Book 2',
           'description'=>'Cool Harry Potter Book 2 series',
           'price'=>50,
       ]);
       $product->save();
   
       $product = new App\Product([
           'image_path'=>'/storage/images/ava3.jpg',
           'title'=>'Harry Potter Book 3',
           'description'=>'Cool Harry Potter Book 3 series',
           'price'=>30,
       ]);
       $product->save();
       }
    }

