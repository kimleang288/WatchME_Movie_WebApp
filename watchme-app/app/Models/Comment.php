<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['movie_id', 'user_id', 'comment', 'media_type'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
