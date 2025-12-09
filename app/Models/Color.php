<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    /** @use HasFactory<\Database\Factories\ColorFactory> */
    use HasFactory;
    protected $fillable = [
        "ColorName", 
        "ColorCode", 
        "ColorCategoryID"
        
    ];

    public function Products():BelongsToMany{
        return $this->belongsToMany(Product::class);

    }

    public function ColorCategory():BelongsTo{
        return $this->belongsTo(ColorCategory::class);
    }



}
