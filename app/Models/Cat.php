<?php

namespace App\Models;

use App\Models\Toy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function toys()
    {
        return $this->hasMany(Toy::class);
    }
}
