<?php

namespace App\Models;

use App\Traits\Audit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;
    use Audit;
    protected $fillable = [
        'stock',
        'status',
        'detailed_product_id',
        'location',
        'expiration_date',
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

    public function detailedProduct():BelongsTo
    {
        return $this->belongsTo(DetailedProduct::class);
    }
}
