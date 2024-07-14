<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'detail',
        'value',
        'customer_id'
    ];

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
