<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Shop
 */
class ProductController extends Controller
{
    public function productDetail(int $id)
    {
        $product = Product::with(['images'])->findOrFail($id);

        return view('shop.page.product-detail', compact('product'));
    }

    public function addCart(Request $request, $id): JsonResponse
    {
        $product = Product::query()->findOrFail($id);

        $quantity = $request->input('quantity');
        $data['id'] = $id;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['price'] = number_price($product->price, $product->sale);
        $data['weight'] = '1';
        $data['options'] = [
            'image' =>  $product->feature_image_before,
            'sale' => $product->sale,
            'size' => $request->input('size')
        ];
        Cart::add($data);
        $qtyCart = Cart::count();
        $contents = Cart::content();
        $view = view('components.shop.cart-detail', compact('contents'))->render();
        return response()->json([
            'code'    => 200,
            'message' => 'success',
            'count' => $qtyCart,
            'data' => Cart::content(),
            'view' => $view
        ]);
    }

    public function show()
    {
        $contents = Cart::content();

        return view('components.shop.cart-detail', compact('contents'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        Cart::remove($id);
        $contents = Cart::content();

        return view('components.shop.cart-detail', compact('contents'));

    }

    public function updateQty(Request $request)
    {

        $qty = $request->input('quantity');
        $id = $request->input('id');
        Cart::update($id, $qty);
        $contents = Cart::content();

        return view('components.shop.cart-detail', compact('contents'));
    }

    public function autoCompleteSearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = [];
        if (!empty($keyword)) {
            $products = Product::query()
                ->where('name', 'LIKE', "%{$keyword}%")
                ->get();
        }

        return view('shop.components.result_search', compact('products'));
    }
}
