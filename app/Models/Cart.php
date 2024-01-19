<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $guarded = [];

    public function customer (){
        return $this->belongsTo(User::class);
    }

    public function hour (){
        return $this->belongsTo(Hour::class);
    }
}
