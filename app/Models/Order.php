<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'sale_id',
        'user_role_id'
    ];

    public function userRole():BelongsTo
    {
        return $this->belongsTo(UserRole::class);
    }
}
