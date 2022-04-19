<?php

namespace App\Models;

use App\Models\Florist;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $taxRate = .05;

    protected $fillable = [
        'total',
        'note',
        'order_number',
        'florist_id',
        'customer_id',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($order) {
            $order->order_number = Str::kebab($order->customer->name . '-' . now('CST')->toDateString());
        });
    }

    public function note(): Attribute
    {
        return new Attribute(
            set: function ($note) {
                if (strlen($note)) {
                    return '<p><strong>Note:</strong> ' . $note . '</p>';
                }

                return '';
            }
        );
    }

    public function total(): Attribute
    {
        return new Attribute(
            get: function ($total) {
                return $total * $this->taxRate;
            }
        );
    }

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
