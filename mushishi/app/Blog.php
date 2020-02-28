<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Blog
 *
 * @property-read \App\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog query()
 * @mixin \Eloquent
 */
class Blog extends Model
{
    protected $guarded = [];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
