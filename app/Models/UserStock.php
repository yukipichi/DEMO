<?php

namespace App\Models;

use App\Http\Controllers\StockController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStock extends Model
{

    protected $table = 'users_stocks';

    protected $fillable = [
        'id',
        'stock_id',
        'user_id'
    ];

    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock', 'stock_id');
    }

    public function showMyCart()
    {
        $userId = Auth::id();
        return $this->where('user_id',$userId)->with('stock')->get();
    }


    public function addMyCart($stockId)
    {
        $userId = Auth::id();
        $cartAddInfo = $this->firstOrCreate(['stock_id' => $stockId, 'user_id' => $userId]);

        if ($cartAddInfo->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
        }

        return $message;
    }

    public function deleteMycartStock($stockId)
    {
        $userId = Auth::id();
        $deleteStockCount = $this->where('user_id', $userId)->where('stock_id', $stockId)->delete();

        if ($deleteStockCount > 0) {
            $message = 'カートから一つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }
        return $message;
    }
}
