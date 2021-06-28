<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KleinoController extends Controller
{
    public function index()
    {
        $sliders = Slider::all()->toArray();
        $products = Product::query()->where('active', 1)->where('hot', 1)->latest()->take(10)->get();

        return view('shop.page.index', compact('sliders', 'products'));
    }

    public function account()
    {
        $user = Auth::guard('customer')->user();

        return view('shop.page.account', compact('user'));
    }

    public function getAllProduct(Request $request)
    {
        $sort = $request->get('sort_by');
        $products = new Product();

        if (!$sort) {
            $products = $products->latest()->paginate(10);
        }

        if ($sort === 'price-ascending') {
            $products = $products->orderBy('price')->paginate(10);
        }

        if ($sort === 'price-descending') {
            $products = $products->orderBy('price', 'desc')->paginate(10);
        }

        if ($sort === 'title-ascending') {
            $products = $products->orderBy('name')->paginate(10);
        }

        if ($sort === 'title-descending') {
            $products = $products->orderBy('name', 'desc')->paginate(10);
        }

        if ($sort === 'created-descending') {
            $products = $products->orderBy('created_at', 'desc')->paginate(10);
        }

        if ($sort === 'created-ascending') {
            $products = $products->orderBy('created_at')->paginate(10);
        }

        return view('shop.page.products', compact('products'));
    }
}
