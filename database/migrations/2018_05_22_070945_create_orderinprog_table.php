<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderinprogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinprogs', function (Blueprint $table) {
          $table->increments('id');
          $table->text('title');
          $table->text('image');
          $table->integer('order_id');
          $table->text('description');
          $table->text('expecteddate');
          $table->text('timesincestart');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderinprogs');
    }
}
