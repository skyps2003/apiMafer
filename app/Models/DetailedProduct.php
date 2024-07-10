<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'category_id',
        'provider_id'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function provider():BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function invetories():HasMany
    {
        return $this->hasMany(Inventory::class);
    }

}
