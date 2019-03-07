<?php

use Illuminate\Database\Seeder;

class article_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\article::class, 30)->create();
    }
}
