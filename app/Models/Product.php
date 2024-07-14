<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [  //data that should be stored in the database is given here. and they should matvh with the coloumn names of the respective table.
        'name',
        'category',
        'color',
        'size',
        'quantity',
        'initial_price',
        'last_rented_price',
        'description',
        'image'
    ];

    public function invoices()
    {
        return
        $this->hasMany(Invoice::class);
    }
}
