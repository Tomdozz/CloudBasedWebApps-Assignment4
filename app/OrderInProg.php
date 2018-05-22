<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class OrderInProg extends Model
{
  protected $table = "orderinprogs";
  public function getOrder(){
    return $table->orders;
  }
}
