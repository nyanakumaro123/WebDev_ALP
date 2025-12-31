<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $fillable = [
        "SupplierName",
        "CompanyName"
        
    ];

    public function StockHistory():HasMany{
        return $this->hasMany(StockHistory::class);
    }
    
    public function Product():HasMany{
        return $this->hasMany(Product::class, 'SupplierID');
    }

    
}
