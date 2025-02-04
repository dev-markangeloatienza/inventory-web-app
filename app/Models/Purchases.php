<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseItems;


class Purchases extends Model
{
    /** @use HasFactory<\Database\Factories\PurchasesFactory> */
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'total_cost',
        'purchase_date'
    ];
    public function purchaseItems(){
        return $this->hasMany(PurchaseItems::class);
    }
}
