<?php

use Illuminate\Database\Seeder;

class OrderOrderinprogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('order_orderinprog')->insert([
           [
             'order_id'=> 1,
             'orderinprog_id'=> 1,
             "created_at"=>date("Y-m-d H:i:s"),
             "updated_at"=>date("Y-m-d H:i:s")
           ]
         ]);
    }
}
