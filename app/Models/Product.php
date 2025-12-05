<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'unit',
        'picture',
        'status'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function batch()
    {
        return $this->hasMany(Batch::class);
    }
}
