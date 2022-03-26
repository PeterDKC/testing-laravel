<?php

namespace App\Models;

use App\Models\Florist;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'note',
        'florist_id',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function florist()
    {
        return $this->belongsTo(Florist::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
