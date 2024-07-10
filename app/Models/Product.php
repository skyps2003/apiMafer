<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'img',
        'price'
    ];

    public function detailedProducts():HasMany
    {
        return $this->hasMany(DetailedProduct::class);
    }
}
