<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shops.index', compact('shops'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // IDが数値かをバリデーション
        if (!is_numeric($id)) {
            return redirect()->route('shops.index')->with('error', 'Invalid Shop ID.');
        }

        // IDに対応するShopが存在するかを確認
        $shop = Shop::find($id);
        if (!$shop) {
            return redirect()->route('shops.index')->with('error', 'Shop not found.');
        }

        // 問題なければ、データを表示
        return view('shops.show', ['shop' => $shop]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function search(Request $request)
    {
        $query = Shop::query();

        // キーワードが指定されている場合のみ検索を実行
        if ($request->filled('keyword')) {
          $keyword = $request->keyword;
          $query->where('name', 'like', '%' . $keyword . '%');
        }

        // ページネーションを追加（1ページに10件表示）
         $shops = $query->get();
        //   ->paginate(10);

        return view('shops.search', compact('shops'));
    }

    public function thanks()
    {
        return view('shops.thanks');
    }
}
