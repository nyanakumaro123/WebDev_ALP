<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable = [
        
        "InvoiceDate",
        "CustomerName",
        "OrderID",
        "UserID",
        "PaymentID"
        
   
        
    ];

    public function DetailOrder():BelongsTo{
        return $this->belongsTo(DetailOrder::class);
    }

    public function User():belongsto{
        return $this->belongsTo(User::class);
    }

    public function Payment():belongsto{
        return $this->belongsTo(Payment::class);
    }
}
