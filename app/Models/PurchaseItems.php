<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchases;
use App\Models\Products;

class PurchaseItems extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseItemsFactory> */
    use HasFactory;

    protected $fillable = [
        "purchase_id",
        "product_id",
        "quantity"
    ];

    public function purchase(){
        return $this->belongsTo(Purchases::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
