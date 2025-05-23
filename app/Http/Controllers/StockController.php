<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\UserStock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function addMyCart(Request $request, UserStock $userStock)
    {
        //カートに追加の処理
        $stockId = $request->stockId;
        $message = $userStock->addMyCart($stockId);

        //追加後の情報を取得
        $myCartStocks = $userStock->showMyCart();

        return view('myCart', compact('myCartStocks', 'message'));
    }
    public function deleteMyCartStock(Request $request, UserStock $userStock)
    {
        $stockId = $request->stockId;
        $message = $userStock->deleteMyCartStock($stockId);

        $myCartStocks = $userStock->showMyCart();

        return view('myCart', compact('myCartStocks', 'message'));
    }
    public function index()
    {
        $stocks = Stock::SimplePaginate(6);
        return view('stocks', compact('stocks'));
    }

    public function myCart(UserStock $userStock)
    {
        $myCartStocks = $userStock->showMyCart();
        return view('myCart', compact('myCartStocks'));
    }

    public function detail(Request $request, Stock $stock)
    {
        $stockId = $request->id;
        $stock = $stock->detail($stockId);

        return view('stockDetail', compact('stock'));
    }
}
