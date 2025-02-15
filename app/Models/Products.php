<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\InventoryLogs;
use App\Models\Supplier;
use App\Models\PurchaseItems;
use App\Models\SaleItems;

class Products extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'sku',
        'stock',
        'price'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function inventoryLogs(){
        return $this->hasMany(InventoryLogs::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseItems(){
        return $this->hasMany(PurchaseItems::class);
    }

    public function saleItems(){
        return $this->hasMany(SaleItems::class);
    }
}
