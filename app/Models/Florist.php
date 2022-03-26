<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Florist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
