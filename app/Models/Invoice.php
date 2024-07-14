<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'payment_amount',
        'total_amount',
        'balance',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

