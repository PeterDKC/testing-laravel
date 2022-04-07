<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'price',
        'on_hand',
    ];

    public function orders()
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeArrangements(Builder $query)
    {
        $query->where('type', 'Arrangement');
    }

    public function scopePurchased(Builder $query)
    {
        $query->whereHas('orders');
    }
}
