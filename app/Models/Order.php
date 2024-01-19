<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'cart_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

}
