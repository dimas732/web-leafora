<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batch';

    protected $fillable = [
        'product_id',
        'exp_date'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
