<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;

class KleinoController extends Controller
{
    public function index()
    {
        Cart::destroy();
        $sliders = Slider::all()->toArray();
        $products = Product::query()->where('active', 1)->where('hot', 1)->latest()->take(10)->get();

        return view('shop.page.index', compact('sliders', 'products'));
    }
}
