<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rol_id',
        'status'
    ];
    public function rol():BelongsTo
    {
        return $this->belongsTo(Rol::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }
}
