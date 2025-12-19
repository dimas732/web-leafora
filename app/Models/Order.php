<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'cust_name',
        'cust_phone',
        'pickup_time',
        'total_price',
        'status',
        'invoice',
        'created_at'
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
