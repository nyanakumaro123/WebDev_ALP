<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Size extends Model
{
    /** @use HasFactory<\Database\Factories\SizeFactory> */
    use HasFactory;

    protected $fillable = [
        "SizeValue",
        "SizeCategoryID"
        
    ];

    public function SizeCategory():BelongsTo{
        return $this->belongsTo(SizeCategory::class);
    }
    public function Products():BelongsToMany{
        return $this->belongsToMany(Product::class);

    }
}
