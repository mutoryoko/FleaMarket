<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'item_name', 'item_image', 'condition', 'price', 'brand', 'description',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function favoriteItems()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
