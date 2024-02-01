<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetCartContentController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);

        return view('cart.index', compact('cartItems'));
    }

}
