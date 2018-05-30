<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderInProg;
use App\Cost;
class Order extends Model
{
  public function orderInProg(){
    return $this->hasOne('App\OrderInProg');
  }
  public function costs(){
    return $this->hasOne('App\Cost');
  }
  protected $fillable = [
    'title',
    'image',
    'description',
    'price',
    'name',
    'email',
    'phonenumber'
];
}
