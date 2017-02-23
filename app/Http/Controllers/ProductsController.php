<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Label;
use App\Seller;
use App\Review;
use Response;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
  public function index(){
    $products = Product::all();
    $list_products = array();
    foreach($products as $i => $product){

      $product_attributes = [$product, $product -> seller(), $product -> labels()];
      $list_products[] = $product_attributes;
    }
    return Response::json($list_products);
  }

  public function show(Product $product)
  {
    $product_attributes = [$product, $product -> seller, $product -> labels];

    return Response::json($product_attributes);
  }

  public function store(ProductRequest $request)
  {
    $attributes_product = [$request-> input('name') , $request -> input('price'), $request -> input('description')];
    $product= Product::create($attributes_product);
    $labels = $request -> input('labels');
    $seller_id = $request ->input('seller_id');
    $seller = Seller::findOrFail($seller_id);
    $product -> labels() -> save($labels);
    $product -> seller() -> save($seller);

    return Response::json($product);
  }

  public function update(ProductRequest $request,Product $product)
  {
    $attributes_product = [$request-> input('name') , $request -> input('price'), $request -> input('description')];
    $product -> update($attributes_product);
    $labels = $request -> input('labels');

    $sellers = Product::all('id');
    $id_seller = $request -> input('seller');
    $seller = $sellers -> get("id",$id_seller);
    $product -> labels() -> update($labels);
    $product -> seller() -> update($seller);

    return Response::json($product);
  }
  public function update_partial(Request $request,Product $product)
  {
    $attributes_product = [$request-> input('name') , $request -> input('price'), $request -> input('description')];
    $product -> update($attributes_product);
    $labels = $request -> input('labels');

    $sellers = Product::all('id');
    $id_seller = $request -> input('seller');
    $seller = $sellers -> get("id",$id_seller);

    $product -> labels() -> update($labels);
    $product -> seller() -> update($seller);

    return Response::json($product);
  }


  public function destroy(Product $product)
  {

    $reviews = $product -> reviews() ;
    for($i=0; $i<$reviews->count();$i++){
      $review = $reviews -> get("id",$i+1);
      $review -> delete();
    }
    $product-> delete();
    return Response::json([],204);
  }

  public function store_review(ReviewRequest $request,Product $product)
  {
    $attributes = $request->all();
    $review = new Review($attributes);
    $product->reviews()->save($review);
    return Response::json($review);
  }

  public function index_reviews(Product $product)
  {
    $reviews = $product -> reviews();
    return Response::json($reviews);
  }

  public function destroy_review(Product $product)
  {
    $product->reviews -> delete();
    return Response::json([],204);
  }

}
