<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Label;
use App\Seller;
use App\Review;
use Response;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductUpdatePartialRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
  public function index(){
    return Response::json(Product::with('seller','labels')->get());
  }

  public function show(Product $product)
  {
    return Response::json($product->load('seller','labels'));
  }

  public function store(ProductRequest $request)
  {
    $attributes_product = Input::only('name','price','description');

    $product= new Product($attributes_product);
    $seller_id = $request->input('seller_id');
    $product ->seller()->associate($seller_id);
    $product-> save();
    $labels = $request -> input('labels');
    //$product -> labels() -> save($labels);
    foreach ($labels as $label_name) {
      $label = Label::firstOrCreate(['name' => $label_name]);
      $product -> labels() -> save($label);
    }

    return Response::json($product -> load('seller','labels'));
  }

  public function update(ProductUpdateRequest $request,Product $product)
  {
    $attributes= $request -> all();
    $product -> update($attributes);
    return Response::json($product->load('seller','labels'));
  }

  public function update_partial(ProductUpdatePartialRequest $request,Product $product)
  {
    $attributes = $request -> all();
    $product -> update($attributes);
    return Response::json($product-> load('seller','labels'));
  }

  public function destroy(Product $product)
  {
    $product-> delete();
    return Response::json([],204);
  }

  public function store_review(ReviewRequest $request,Product $product)
  {
    $attributes = $request->all();
    $review = new Review($attributes);
    $product->reviews()->save($review);
    return Response::json($product->load ('reviews'));
  }

  public function index_reviews(Product $product)
  {
    $reviews = $product -> reviews;
    return Response::json($reviews);
  }

  public function destroy_review(Product $product, Review $review)
  {
    $review -> delete();
    return Response::json([],204);
  }

}
