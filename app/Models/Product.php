<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Traits\HasEnumProperties;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasEnumProperties;

    protected $fillable = [
        'name',
        'description',
        'type',
        'price',
        'on_hand',
    ];

    protected $enumTypes = [
        'Arrangement',
        'Cut Flower',
        'Misc',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
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
