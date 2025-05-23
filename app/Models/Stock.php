<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'fee',
        'imagePath',
        'explane',

    ];

    public function detail($stockId)
    {
        return $this->find($stockId);
    }
}
