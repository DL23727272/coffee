<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    private function getPrice($productName, $size) {
        // Adjust the logic to fetch prices from your database or another source
        $prices = [
            'Caffe Latte' => ['venti' => 105, 'grande' => 90],
            'Capuccino' => ['venti' => 105, 'grande' => 90],
            'Spanish Latte' => ['venti' => 125, 'grande' => 110],
            'Americano' => ['venti' => 105, 'grande' => 90],
            'Caramel Macchiato' => ['venti' => 140, 'grande' => 155],
            'Signature Latte' => ['venti' => 165, 'grande' => 150],
        ];

        return $prices[$productName][$size] ?? 0;
    }

    public function addToCart(Request $request)
    {
        // Validation rules
        $rules = [
            'productName' => 'required',
            'name' => 'required',
            'size' => 'required',
            'temperature' => 'required',
        ];

        // Validate the request
        $request->validate($rules);

        // Get the posted data from the request
        $productName = $request->input('productName');
        $name = $request->input('name');
        $size = $request->input('size');
        $temperature = $request->input('temperature');

        // Get the price based on the product and size
        $price = $this->getPrice($productName, $size);

        // Retrieve the current cart items from the session
        $cartItems = $request->session()->get('cart', []);

        // Add the new item to the cart items array
        $cartItem = [
            'productName' => $productName,
            'name' => $name,
            'size' => $size,
            'temperature' => $temperature,
            'price' => $price,
        ];

        $cartItems[] = $cartItem;

        // Store the updated cart items array back into the session
        $request->session()->put('cart', $cartItems);

        // Prepare the response array with the added item details
        $response = [
            'status' => 'success',
            'item' => $cartItem,
        ];

        // Respond with the JSON-encoded response
        return response()->json($response);
    }
}
