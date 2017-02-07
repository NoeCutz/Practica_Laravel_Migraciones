<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('labels_products', function (Blueprint $table) {
          $table->integer('label_id')->unsigned();
          $table->foreign('label_id')
          ->references('id')
          ->on('labels');

          $table->integer('product_id')->unsigned();
        $table->foreign('product_id')
        ->references('id')
        ->on('products');

       $table->timestamps();

     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('labels_products', function (Blueprint $table) {
        $table->dropForeign(['product_id']);
        $table->dropColumn('product_id');
        $table->dropForeign(['label_id']);
        $table->dropColumn('label_id');
      });
    }
}
