<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_sale',
        'total_quantity',
        'customer_id',
        'detailed_product_id',
        'payment_method_id'
    ];

    public function detailedProduct():BelongsTo
    {
        return $this->belongsTo(DetailedProduct::class);
    }

    public function paymentMethod():BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    

}
