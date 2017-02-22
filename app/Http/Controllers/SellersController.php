<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Response;
use App\Address;

class SellersController extends Controller
{
    public function index(){
      return Response::json(Seller::all());
    }

    public function show(Seller $seller)
    {
      return Response::json($seller);
    }

    public function store(Request $request)
    {
      $attributes = $request->all();
      $seller= Seller::create($attributes);
      return Response::json($seller);
    }

    public function update(Request $request,Seller $seller)
    {
      $attributes = $request->all();
      $seller-> update($attributes);
      return Response::json($seller);
    }

    public function destroy(Seller $seller)
    {
      $seller->delete();
      return Response::json([],204);
    }

    public function store_address(Request $request,Seller $seller)
    {
      $attributes = $request->all();
      $address = new Address($attributes);
      $seller->address()->save($address);
      return Response::json($address);
    }

    public function update_address(Request $request,Seller $seller)
    {
      $attributes = $request->all();
      $address = $seller->address;
      $address->update($attributes);
      return Response::json($address);
    }
}
