<?php

namespace App\Models;

use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        "ProductName",
        "Price",
        "ProductQuantity",
        "Image",
        "BrandID",
        "SupplierID",
        "ProductCategoryID",
        
    ];

    public function Brand():BelongsTo{
        return $this->belongsTo(Brand::class, 'BrandID');
    }

    public function ProductCategory():BelongsTo{
        return $this->belongsTo(ProductCategory::class, 'ProductCategoryID');
    }

    public function Supplier():BelongsTo{
        return $this->belongsTo(Supplier::class, 'SupplierID');
    }

    public function DetailOrders():BelongsToMany{
        return $this->belongsToMany(DetailOrder::class);
    }

    public function Colors():belongsToMany{
        return $this->belongsToMany(Color::class, 'color_products', 'ProductID', 'ColorID');
    }

    public function Sizes():BelongsToMany{
        return $this->belongsToMany(Size::class, 'product_sizes', 'ProductID', 'SizeID');
    }

    public function Users():BelongsToMany{
        return $this->belongsToMany(User::class, 'product_users');
    }

    public function StockHistory():HasMany{
        return $this->hasMany(StockHistory::class);
    }


}
