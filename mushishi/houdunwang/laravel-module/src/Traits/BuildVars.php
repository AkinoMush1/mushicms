<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/8 下午11:16
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
namespace Houdunwang\Module\Traits;

use Symfony\Component\Console\Helper\Helper;

trait BuildVars
{
    protected $vars = [];
    protected $modulePath;

    protected function setVars($model, $module)
    {
        /**
         * MIGRATION        模型名复数
         * SNAKE_MIGRATION    下划线复数小写
         * NAMPSPACE        到模块的命名空间
         * MODEL            模型名
         * SMODEL           全部小写的模型名
         * SMODULE            全部小写模块名
         * MODEL_TITLE        模型中文名在数据表设置
         */
        $this->vars['MODEL']           = $model;
        $this->vars['MODULE']          = $module;
        $this->vars['MIGRATION']       = \Str::plural($model);
        $this->vars['SNAKE_MIGRATION'] = \Str::snake(\Str::plural($model));
        $this->vars['NAMESPACE']       = config('modules.namespace').'\\'.$module.'\\';
        $this->vars['SMODEL']          = \Str::snake($model);
        $this->vars['SMODULE']         = \Str::snake($module);
        $this->vars['MODULE_PATH']     = config('modules.paths.modules').'/'.$module.'/';
        $this->vars['MODEL_PATH']      = $this->vars['MODULE_PATH'].'Entities/';
        $this->vars['CONTROLLER_PATH'] = $this->vars['MODULE_PATH'].'Http/Controllers/';
        $this->vars['REQUEST_PATH']    = $this->vars['MODULE_PATH'].'Http/Requests/';
    }

    protected function setVar($name, $value)
    {
        $this->vars[$name] = $value;
    }

    protected function getVar($name)
    {
        return $this->vars[$name];
    }

    protected function getAllVars()
    {
        return $this->vars;
    }

    protected function replaceVars($file)
    {
        $content = file_get_contents($file);
        foreach ($this->vars as $var => $value) {
            $content = str_replace('{'.$var.'}', $value, $content);
        }

        return $content;
    }
}
