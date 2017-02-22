<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
      protected $fillable = ['name','lastname'];

      public function address(){
        return $this->hasOne(Address::class);
      }

      public function products(){
        return $this->hasMany(Product::class);
      }
}
