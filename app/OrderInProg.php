<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class OrderInProg extends Model
{
  public function getOrder(){
    return $this->orders;
  }
}
