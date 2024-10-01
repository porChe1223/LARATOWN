<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shops.index', compact('shops'));
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('shops.index')->with('error', 'Invalid Shop ID.');
        }

        $shop = Shop::find($id);
        if (!$shop) {
            return redirect()->route('shops.index')->with('error', 'Shop not found.');
        }

        return view('shops.show', ['shop' => $shop]);
    }

    public function search(Request $request)
    {
        $query = Shop::query();

        if ($request->filled('keyword')) {
          $keyword = $request->keyword;
          $query->where('name', 'like', '%' . $keyword . '%');
        }

        $shops = $query->get();

        return view('shops.search', compact('shops'));
    }

    public function thanks()
    {
        return view('shops.thanks');
    }
}
