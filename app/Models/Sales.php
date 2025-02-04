<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SaleItems;
use App\Models\Products;
class Sales extends Model
{
    /** @use HasFactory<\Database\Factories\SalesFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        'total_price',
        "sale_date"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function saleItems(){
        return $this->hasMany(SaleItems::class);
    }

    public function products(){
        return $this->hasMany(Products::class);
    }
}
