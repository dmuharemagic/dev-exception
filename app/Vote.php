<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $timestamps = false;

    protected $table = 'votes';

    protected $fillable = [
        'value',
        'user_id',
        'post_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
