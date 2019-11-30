<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'link',
        'image',
        'body',
        'user_id',
        'slug'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeNewest($query)
    {
        return $query->latest();
    }

    public function scopeHottest($query)
    {
        return $query->leftJoin('votes', 'votes.post_id', '=', 'posts.id')
            ->selectRaw('posts.*, sum(votes.value) as total')->groupBy('posts.id')->orderByDesc('total');
    }

    public function scopeRising($query)
    {
        return $query->hottest()->where('created_at', '>=', Carbon::now()->subDays(2)->toDateTimeString());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
