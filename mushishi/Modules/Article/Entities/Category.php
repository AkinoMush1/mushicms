<?php

namespace Modules\Article\Entities;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'pid'];

    public function getAll($category = null) {
        $datas = $this->all()->toArray();
        if (!is_null($category)) {
            foreach ($datas as $k => $v) {
                $datas[$k]['_selected'] = $v['id'] == $category['pid'];
                $datas[$k]['_disabled'] = $v['id'] == $category['id'] ||
                    (new Arr())->isChild($datas, $v['id'], $category['id'], 'id');
            }
        }

        return (new Arr())->tree($datas, 'name', 'id');
    }

    public function hasChild($category) {
        $datas = $this->all()->toArray();
        return (new Arr())->hasChild($datas, $category->id, $fieldPid = 'pid') ? true : false ;
    }
}
