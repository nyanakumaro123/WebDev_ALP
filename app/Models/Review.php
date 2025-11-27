<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        "UserID",
        "Rating",
        "Comment"
        
    ];

    public function User():belongsTo{
        return $this->belongsTo(User::class);
    }
}
