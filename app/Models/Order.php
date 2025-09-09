<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_address',
        'customer_phone',
        'status',
        'total_amount',
        'is_completed',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
