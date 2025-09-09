<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request, Order $order)
    {
        $order->update([
            'is_completed' => $request->has('is_completed')
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }
}