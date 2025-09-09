<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $isMobile = preg_match('/(android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini)/i', $request->userAgent());
        $viewName = $isMobile ? 'about-us_mobile' : 'about-us';

        return view($viewName);
    }
}