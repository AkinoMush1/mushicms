<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\IdentityCard
 *
 * @property int $id
 * @property int $user_id
 * @property string $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IdentityCard whereUserId($value)
 * @mixin \Eloquent
 */
class IdentityCard extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
