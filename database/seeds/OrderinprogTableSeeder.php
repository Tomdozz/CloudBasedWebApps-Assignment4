<?php

use Illuminate\Database\Seeder;

class OrderinprogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orderinprogs')->insert(
     [
       [
         "title"=>"Kniv",
         "image"=>"https://teq  uals0.files.wordpress.com/2012/01/p1010940.jpg",
         "order_id"=>1,
         "description"=>"Just nu är bladet klart och härdas i väntan på att ädelträhantagt ska slipas",
         "expecteddate"=>"23/7-18",
         "timesincestart"=>"för länge",
         "created_at"=>date("Y-m-d H:i:s"),
         "updated_at"=>date("Y-m-d H:i:s")
       ]
     ]);
    }
}
