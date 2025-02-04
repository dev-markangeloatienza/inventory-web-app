<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sales;
use App\Models\Products;

class SaleItems extends Model
{
    /** @use HasFactory<\Database\Factories\SaleItemsFactory> */
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity'
    ];

    public function sale(){
        return $this->belongsTo(Sales::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
