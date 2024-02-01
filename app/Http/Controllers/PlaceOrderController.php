<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceOrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Check if the 'cart' session variable exists
        if ($request->session()->has('cart')) {
            $cartItems = $request->session()->get('cart');

            // Insert orders into the database
            try {
                DB::beginTransaction();

                // Get the current date and time
                $orderDate = now();

                foreach ($cartItems as $cartItem) {
                    $productName = $cartItem['productName'];
                    $customerName = $cartItem['name'];
                    $size = $cartItem['size'];
                    $temperature = $cartItem['temperature'];
                    $price = $cartItem['price'];

                    // Insert order details into the 'orders' table
                    DB::table('orders')->insert([
                        'product_name' => $productName,
                        'customer_name' => $customerName,
                        'size' => $size,
                        'temperature' => $temperature,
                        'price' => $price,
                        'order_date' => $orderDate,
                    ]);
                }

                // Clear the cart after placing the order
                $request->session()->forget('cart');

                DB::commit();

                return response()->json(['status' => 'success']);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 'error']);
            }
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}
