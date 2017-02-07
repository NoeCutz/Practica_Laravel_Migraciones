<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','description'];

    public function seller(){
      return $this->belongsTo(Seller::class);
    }

    public function reviews(){
      return $this->hasMany(Review::class);
    }

    public function labels(){
      return $this->belongsToMany( Label::class, 'labels_products');
    }
}
