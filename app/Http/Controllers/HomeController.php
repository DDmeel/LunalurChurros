<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $bestsellers = collect(); // Empty collection

        $isMobile = preg_match('/(android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini)/i', $request->userAgent());
        $viewName = $isMobile ? 'welcome_mobile' : 'welcome';

        return view($viewName, compact('bestsellers', 'products'));
    }
}
