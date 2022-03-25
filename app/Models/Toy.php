<?php

namespace App\Models;

use App\Models\Cat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cat_id'];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
}
