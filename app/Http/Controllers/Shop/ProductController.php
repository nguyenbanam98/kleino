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

        return response()->json([
            'code'    => 200,
            'message' => 'success',
            'count' => $qtyCart,
            'data' => Cart::content()
        ], 200);
    }
}
