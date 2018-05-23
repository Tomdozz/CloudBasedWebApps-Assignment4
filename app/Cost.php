<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class Cost extends Model
{
  public function orders(){
    return $table->belongsTo('App\Order');
  }
}
