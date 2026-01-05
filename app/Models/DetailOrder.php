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

        "OrderQuantity",
        "TotalPricePerItem",
        "FinalPrice",
        "CreatedBy"
    ];

    public function Products():BelongsToMany{
        return $this->belongsToMany(Product::class, 'detail_order_products', 'DetailOrderID', 'ProductID');
    }

    public function Colors():BelongsToMany{
        return $this->belongsToMany(Color::class, 'detail_order_colors', 'DetailOrderID', 'ColorID');
    }

    public function Sizes():BelongsToMany{
        return $this->belongsToMany(Size::class, 'detail_order_sizes', 'DetailOrderID', 'SizeID');
    }




}
