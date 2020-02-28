<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $guarded = [];

//    public function comments() {
//        return $this->hasMany(Comment::class);
//    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
