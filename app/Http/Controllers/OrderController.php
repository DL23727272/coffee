<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = DB::table('orders')->get();
        return view('admin', ['orders' => $orders]);
    }

    public function markOrderAsDone(Request $request)
    {
        $orderId = $request->input('orderId');
        DB::table('orders')->where('id', $orderId)->update(['status' => 'done']);

        return response()->json(['status' => 'success']);
    }
}
