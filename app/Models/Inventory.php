<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock',
        'status',
        'detailed_product_id',
        'location',
        'expiration_date'
    ];

    public function detailedProduct():BelongsTo
    {
        return $this->belongsTo(DetailedProduct::class);
    }
}
