<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['total', 'user_id'];
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
