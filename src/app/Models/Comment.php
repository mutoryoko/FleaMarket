<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'items_id', 'content'];

    public function commentsByUsers()
    {
        return $this->belongsTo(User::class);
    }

    public function commentsOnItems()
    {
        return $this->belongsTo(Item::class);
    }
}
