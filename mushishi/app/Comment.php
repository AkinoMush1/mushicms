<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property-read \App\Article $article
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $guarded = [];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function commentable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
