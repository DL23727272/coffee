<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemoveFromCartController extends Controller
{
    public function removeFromCart(Request $request)
    {
        // Validate the request data
        $request->validate([
            'index' => 'required|integer',
        ]);

        $index = $request->input('index');

        // Retrieve the current cart items from the session
        $cartItems = $request->session()->get('cart', []);

        if (isset($cartItems[$index])) {
            // Remove the item from the cart
            unset($cartItems[$index]);

            // Re-index the array to prevent issues with JSON encoding
            $cartItems = array_values($cartItems);

            // Update the cart items array in the session
            $request->session()->put('cart', $cartItems);

            // Prepare the response array
            $response = [
                'status' => 'success',
                'message' => 'Item removed from the cart.',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid item index.',
            ];
        }

        // Respond with the JSON-encoded response
        return response()->json($response);
    }
}
