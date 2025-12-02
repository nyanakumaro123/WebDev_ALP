<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductType extends Model
{
    /** @use HasFactory<\Database\Factories\ProductTypeFactory> */
    use HasFactory;

    protected $fillable = [
        "ProductTypeName",
        
        
    ];

    public function Products():HasOne{
        return $this->hasOne(Product::class);
    }
}
