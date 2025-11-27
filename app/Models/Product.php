<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        "ProductName",
        "BrandID",
        "Price",
        "ProductQuantity",
        "Image",
        "ProductTypeID",
        "ProducCategoryID",
        
    ];

    public function Brand():belongsTo{
        return $this->belongsTo(Brand::class);
    }

    public function ProductCategory():belongsTo{
        return $this->belongsTo(ProductCategory::class);
    }
    public function DetailOrders():belongsToMany{
        return $this->belongsToMany(DetailOrder::class);
    }
    public function Colors():belongsToMany{
        return $this->belongsToMany(Color::class);
    }

    public function Sizes():belongsToMany{
        return $this->belongsToMany(Size::class);
    }

    public function Users():belongsToMany{
        return $this->belongstoMany(Users::class);
    }

    public function StockHistory():hasMany{
        return $this->hasMany(StockHistory::class);
    }

    public function ProductType():belongsTo{
        return $this->belongsTo(ProductType::class);
    }


}
