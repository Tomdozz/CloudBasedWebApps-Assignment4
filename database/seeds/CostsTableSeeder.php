<?php

use Illuminate\Database\Seeder;

class CostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('costs')->insert(
     [
       [
         "order_id"=>1,
         "worktime"=>10,
         "meterialcost" => 2000,
         "hourcost" => 150,
         "totalcost" =>3500,
         "notes" => " ",
         "created_at"=>date("Y-m-d H:i:s"),
         "updated_at"=>date("Y-m-d H:i:s")
       ]
     ]);
    }
}
