<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;
class InventoryLogs extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryLogsFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'change_type'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
