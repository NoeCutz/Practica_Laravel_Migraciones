<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $numOfProducts = 2;
      factory(\App\Product::class, $numOfProducts)->create();
    }
}
