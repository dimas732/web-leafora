<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'cost',
        'stock',
        'unit',
        'picture',
        'status',
        'created_at'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function batch()
    {
        return $this->hasMany(Batch::class);
    }

    public function getImageUrl()
    {
        if ($this->picture && Storage::exists('public/' . $this->picture)) {
            return asset('storage/' . $this->picture);
        }

        return asset('img/daging.png');
    }
}
