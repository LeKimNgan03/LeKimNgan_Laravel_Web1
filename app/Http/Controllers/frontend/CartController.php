<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $list_cart = session('carts', []);
        return view("frontend.cart", compact('list_cart'));
    }

    public function addcart()
    {
        $productid = $_GET['productid'];
        $qty = $_GET['qty'];
        $product = Product::find($productid);
        // Cấu trúc 1 item trong giỏ hàng
        $cartitem = array(
            'id' => $productid,
            'image' => $product->image,
            'name' => $product->name,
            'qty' => $qty,
            'price' => ($product->pricesale > 0) ? $product->pricesale : $product->price,
        );
        // Giỏ hàng mảng 2 chiều [$cartitem, $cartitem, .....]
        $carts = session('carts', []);
        if (count($carts) == 0) {
            array_push($carts, $cartitem);
        } else {
            $check = true;
            foreach ($carts as $key => $cart) {
                if (in_array($productid, $cart)) {
                    $carts[$key]['qty'] += $qty;
                    $check = false;
                    break;
                }
            }
            if ($check == true) {
                array_push($carts, $cartitem);
            }
        }
        session(['carts' => $carts]);
        echo count(session('carts', []));
    }

    public function update(Request $request)
    {
        $carts = session('carts', []);
        $list_qty = $request->qty;
        foreach ($carts as $key => $cart) {
            foreach ($list_qty as $productid => $qtyvalue) {
                if ($carts[$key]['id'] == $productid) {
                    $cart[$key]['qty'] += $qtyvalue;
                }
            }
        }
        session(['carts' => $carts]);
        return redirect()->route('site.cart.index');
    }

    public function delete($id)
    {
        $carts = session('carts', []);
        foreach ($carts as $key => $cart) {
            if ($cart[$key]['id'] == $id) {
                unset($carts[$key]);
            }
        }
        session(['carts' => $carts]);
        return redirect()->route('site.cart.index');
    }
}
