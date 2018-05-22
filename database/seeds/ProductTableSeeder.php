<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert(
     [
       [
         "title"=>"Skyrim hjälm",
         "image"=>"http://gadgetsin.com/uploads/2012/10/the_elder_scrolls_v_skyrim_dragonborn_iron_helmet_replica_4.jpg?x78359",
         "description"=>"Skyrim hjäml smidd från plåt och solit järn, insida av äkta läder. Vikt ca 5kg",
         "price"=>6000,
         "created_at"=>date("Y-m-d H:i:s"),
         "updated_at"=>date("Y-m-d H:i:s")
       ]
     ]);
    }
}
