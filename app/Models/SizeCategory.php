<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeCategory extends Model
{
    /** @use HasFactory<\Database\Factories\SizeCategoryFactory> */
    use HasFactory;
    protected $fillable = [
        "SizeCategoryName"
        
    ];

    public function Sizes():hasMany{
        return $this->hasMany(Size::class);
    }
}
