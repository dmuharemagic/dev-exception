<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $table = 'replies';

    protected $fillable = [
        'post_id',
        'body',
        'user_id'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
