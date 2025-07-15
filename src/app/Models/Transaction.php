<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'buyer_id', 'payment_method', 'shipping_address'];

    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
