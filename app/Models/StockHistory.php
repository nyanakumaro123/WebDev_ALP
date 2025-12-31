<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockHistory extends Model
{
    use HasFactory;

    // WAJIB: Karena nama tabel di migrasi Anda adalah 'stock_historys'
    protected $table = 'stock_historys'; 

    protected $fillable = [
        "ProductID",
        "StockDate",
        "SupplierID",
        "StockQuantity",
        "UserID"
    ];

    /**
     * Logika otomatis untuk update stok di tabel Product
     */
    protected static function booted()
    {
        static::created(function ($stockHistory) {
            $product = $stockHistory->Product;
            if ($product) {
                // Pastikan kolom di tabel products adalah 'ProductQuantity'
                $product->increment('ProductQuantity', $stockHistory->StockQuantity);
            }
        });
    }

    public function Product(): BelongsTo {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function Supplier(): BelongsTo {
        return $this->belongsTo(Supplier::class, 'SupplierID');
    }

    public function User(): BelongsTo {
        return $this->belongsTo(User::class, 'UserID');
    }
}