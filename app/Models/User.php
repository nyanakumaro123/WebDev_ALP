<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use Notifiable;

    protected $fillable = ['username', 'email', 'password', 'status'];
    
    protected $hidden = ['password', 'remember_token'];

    public function Products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_users');
    }

    public function StockHistory(): HasMany
    {
        return $this->hasMany(StockHistory::class);
    }
    public function Review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function Invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
