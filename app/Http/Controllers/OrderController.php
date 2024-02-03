<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = DB::table('orders')->get();
        return view('admin', ['orders' => $orders]);
    }

    public function markOrderAsDone(Request $request)
    {
        try {
            $orderId = $request->input('orderId');

            DB::table('orders')->where('id', $orderId)->delete();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
         
            Log::error($e);

            return response()->json(['status' => 'error', 'message' => 'Failed to update order status.']);
        }
    }
}
