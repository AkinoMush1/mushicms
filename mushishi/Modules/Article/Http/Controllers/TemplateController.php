<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Services\TemplateService;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(TemplateService $templateService)
    {
        // 获取public下所有模板的配置信息
        $templates = $templateService->all();

        return view('article::template.index', compact('templates'));
    }

    public function setDefault($name)
    {
        \HDModule::saveConfig(['template'=>$name], 'config');

        return back();

    }
}
