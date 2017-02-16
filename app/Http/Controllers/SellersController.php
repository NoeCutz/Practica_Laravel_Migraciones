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
}
