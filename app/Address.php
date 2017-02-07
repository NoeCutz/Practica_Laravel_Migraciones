<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
      protected $fillable = ['address','city','region','country','postalcode'];

      public function seller(){
        return $this->belongsTo(Seller::class);
      }
}
