<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orders')->insert(
     [
       [
         "title"=>"Kniv",
         "name"=>"Karl johan",
         "phonenumber"=>"123456789",
         "image"=>"http:\/\/www.three.co.uk\/static\/images\/device_pages\/MobileVersion\/Apple\/iPhone_5s\/Space_Grey\/desktop\/1.jpg",
         "description"=>"En kniv med hantag av ädelträ, måtten på bladet ska vara ca 13cm",
         "maxprice"=>6000,
         "created_at"=>date("Y-m-d H:i:s"),
         "updated_at"=>date("Y-m-d H:i:s")
       ]
     ]);
    }
}
