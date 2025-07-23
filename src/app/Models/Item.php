<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'item_image',
        'condition',
        'price',
        'brand',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoriteByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function getConditionTextAttribute(): string
    {
        return getConditionText($this->condition);
    }
}
