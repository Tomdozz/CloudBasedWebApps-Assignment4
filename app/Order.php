<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderInProg;
class Order extends Model
{
  public function orderInProg(){
    return $this->hasOne('App/OrderInProg');
  }
}
