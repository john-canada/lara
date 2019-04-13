<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           [
             'name'=>'John',
             'email'=>'canadajun1972@gmail.com',
             'password'=>bcrypt('admin'),
             'isAdmin' => '1',
            //  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            //  'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')  
           ],
           
           [
            'name'=>'Liza',
            'email'=>'licans@gmail.com',
            'password'=>bcrypt('user'),
            'isAdmin' => '0',
            // 'created_at'=> Carbon::now()->format('Y-m-d','H:i:s'),
            // 'updated_at'=> Carbon::now()->format('Y-m-d','H:i:s')   
          ]
        ]);
    }
}
