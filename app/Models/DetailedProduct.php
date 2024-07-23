<?php

namespace App\Models;

use App\Traits\Audit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailedProduct extends Model
{
    use HasFactory;
    use Audit;
    protected $fillable = [
        'product_id',
        'category_id',
        'provider_id',
        'created_by',
        'updated_by'
    ];
    protected static function boot()
    {
        parent::boot();
        static::bootAudit(); 
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

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
