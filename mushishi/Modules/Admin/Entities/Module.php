<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = [];

    public function setDefault() {
        \DB::table('modules')->update(['is_default'=>0]);

        $this->update([
            'is_default' => 1
        ]);
        return true;
    }

    public function getDefault() {
        $default = $this->where('is_default', 1)->where('front_access', 1)->first();
        return $default['name'];
    }

}
