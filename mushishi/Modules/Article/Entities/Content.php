<?php

namespace Modules\Article\Entities;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','author','content','thumb','click','istop', 'category_id'];

    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
