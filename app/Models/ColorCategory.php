<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ColorCategoryFactory> */
    use HasFactory;
    protected $fillable = [
        "ColorCategoryName"
        
    ];

    public function Colors():hasMany{
        return $this->hasMany(Color::class);
    }
}
