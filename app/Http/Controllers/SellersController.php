<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Response;

class SellersController extends Controller
{
    public function index(){
      return Response::json(Seller::all());
    }

    public function show($seller)
    {
      return Response::json(Seller::findOrFail($seller));
    }

    public function store(Request $request)
    {
      $attributes = $request->all();
      $seller= Seller::create($attributes);
      return Response::json($seller);
    }
}
