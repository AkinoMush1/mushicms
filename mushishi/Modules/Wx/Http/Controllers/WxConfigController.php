<?php

namespace Modules\Wx\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Wx\Entities\WxConfig;
use Modules\Wx\Http\Requests\WxConfigRequest;

class WxConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(WxConfig $wxConfig)
    {
        $wx_config = $wxConfig->pluck('value','name');
        return view('wx::wx_config.index', compact('wx_config'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(WxConfigRequest $request, WxConfig $wxConfig)
    {
        $wxConfig->truncate();
        foreach ($request->all() as $name => $value) {
            $wxConfig->insert(['name' => $name, 'value' => $value]);
        }
        return redirect('/wx/wx_config')->with('success', '微信配置成功');
    }

}
