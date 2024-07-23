<?php

namespace App\Models;

use App\Traits\Audit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use Audit;
    protected $fillable = [
        'name',
        'description',
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

    public function detailedProduct():HasMany
    {
        return $this->hasMany(DetailedProduct::class);
    }

}
