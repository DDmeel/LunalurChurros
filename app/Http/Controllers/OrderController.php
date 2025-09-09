<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string',
            'customer_phone' => 'required|string|max:20',
            'cart' => 'required|json',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $cartItems = json_decode($request->cart, true);

        if (empty($cartItems)) {
            return back()->withErrors(['cart' => 'Keranjang belanja Anda kosong.'])->withInput();
        }

        // Server-side calculation of total amount
        $totalAmount = 0;
        $productIds = array_column($cartItems, 'id');
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        foreach ($cartItems as $item) {
            if (isset($products[$item['id']])) {
                $totalAmount += $products[$item['id']]->price * $item['quantity'];
            } else {
                // Handle case where a product in cart doesn't exist in DB
                return back()->withErrors(['cart' => 'Produk tidak valid ditemukan di keranjang.'])->withInput();
            }
        }

        try {
            DB::beginTransaction();

            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_address' => $request->customer_address,
                'customer_phone' => $request->customer_phone,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                ]);
            }

            DB::commit();

            return back()->with('success', 'Pesanan Sudah Dibuat');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi.'])->withInput();
        }
    }
}
