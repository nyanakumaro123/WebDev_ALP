<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        "PaymentType",
        "PaymentStatus"
        
    ];

    public function Invoice():HasOne{
        return $this->hasOne(Invoice::class);
    }





    
}
