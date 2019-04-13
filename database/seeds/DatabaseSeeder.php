<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(productTableSeeder::class);
         $this->call(article_table_seeder::class);
         $this->call(userTableSeeder::class);
    }
}
