<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /** @use HasFactory<\Database\Factories\SizeFactory> */
    use HasFactory;

    protected $fillable = [
        "SizeValue",
        "SizeCategoryID"
        
    ];

    public function SizeCategory():belongsTo{
        return $this->belongsTo(SizeCategory::class);
    }
    public function Products():belongsToMany{
        return $this->belongsToMany(Product::class);

    }
}
