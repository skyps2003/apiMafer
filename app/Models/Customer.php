<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'dni',
        'ruc',
        'customer_type_id',
        'reason',
        'address',
        'email',
        'phone'
    ];

    public function customerType():BelongsTo
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function sales():HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Customer::class);
    }


}
