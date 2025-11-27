<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DetailOrder extends Model
{
    /** @use HasFactory<\Database\Factories\DetailOrderFactory> */
    use HasFactory;
    protected $fillable = [

        "Quantity",
        "TotalPrice"
        
    ];

    public function Product():BelongsToMany{
        return $this->belongsToMany(Product::class);
    }


}
