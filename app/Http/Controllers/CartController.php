<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $cart = session()->get('cart', []);
        return view('shops.cart', compact('cart', 'shops'));
    }

    public function store(Shop $shop)
    {
        $shop->carted()->attach(auth()->id());
        return back();
    }

    public function destroy(Shop $shop)
    {
        $shop->carted()->detach(auth()->id());
        return back();
    }

    public function addToCart($id)
    {
        $shop = Shop::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $shop->name,
                'quantity' => 1,
                'price' => $shop->price
            ];
        }
        session()->put('cart', $cart);

        $total_price = 0;
        foreach ($cart as $item) {
            $total_price += $item['quantity'] * $item['price'];
        }
        session()->put('total_price', $total_price);

        return redirect()->route('shops.cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        $total_price = 0;
        foreach ($cart as $item) {
            $total_price += $item['quantity'] * $item['price'];
        }
        session()->put('total_price', $total_price);

        return redirect()->route('shops.cart');
    }

    public function addToOrder(Request $request, Shop $shop)
    {
        $cart = $request->session()->get('cart', []);
        $total_price = 0;

        foreach ($cart as $id => $details) {
            $total_price += $details['price'] * $details['quantity'];
        }
       
        foreach ($cart as $id=>$item) {
            Order::create([
                'user_id' => Auth::id(),
                'item_name' => $item['name'],
                'total_price' => $item['price'],
                'place' => $request->input('place')
            ]);
        }

        session()->forget('cart');
        session(['total_price' => 0]);

        return redirect()->route('shops.thanks');
    }
}
