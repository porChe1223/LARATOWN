<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        $cart = session()->get('cart', []);
        return view('shops.cart', compact('cart', 'shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Shop $shop)
    {
        $shop->carted()->attach(auth()->id());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
        return redirect()->route('shops.cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('shops.cart');
    }

    public function addToOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(), // ログインユーザーのID
            'total' => $total,
            'status' => 'pending', // 初期ステータスは "pending"
        ]);

        session()->forget('cart');
        return redirect()->route('shops.thanks');
    }
}
