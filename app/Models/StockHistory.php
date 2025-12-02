<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockHistory extends Model
{
    /** @use HasFactory<\Database\Factories\StockHistoryFactory> */
    use HasFactory;

    protected $fillable = [
        "ProductID",
        "StockDate",
        "SupplierID",
        "StockQuantity",
        "UserID"
        
    ];

    public function Product():BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function Supplier():BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
    public function User():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
