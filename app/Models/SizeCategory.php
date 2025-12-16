<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SizeCategory extends Model
{
    /** @use HasFactory<\Database\Factories\SizeCategoryFactory> */
    use HasFactory;
    protected $fillable = [
        "SizeCategoryName"
        
    ];

    public function Sizes():HasMany{
        return $this->hasMany(Size::class, 'SizeCategoryID');
    }
}
