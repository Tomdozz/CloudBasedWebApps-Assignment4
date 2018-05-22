<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\OrderInProg;
class order_orderinprog extends Model
{
  protected $table = 'order_orderinprog';
  public function order()
  {
    return $table->hasOne('App/Order');
  }
  public function orderInProg()
  {
      return $table->hasOne('App/OrderInProg');
  }
}
