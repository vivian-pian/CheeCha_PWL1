<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'product_name',
        'price',
        'status',
    ];
    //relasinya
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasinya
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}