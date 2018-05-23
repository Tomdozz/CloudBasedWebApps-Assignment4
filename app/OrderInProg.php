<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class OrderInProg extends Model
{
  protected $table = "orderinprogs";
  public function orders(){
    return $table->belongsTo('App/Order');
  }
  public function getOrder(){
    return $table->orders;
  }
}
