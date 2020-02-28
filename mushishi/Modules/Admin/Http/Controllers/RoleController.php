<?php

namespace Modules\Admin\Http\Controllers;

use Houdunwang\Module\Facade\HdModuleConfig;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = Role::where('name', '<>', 'webmaster')->get();
        return view('admin::role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        Role::create(['name'=>$request->name, 'title'=>$request->title]);
        session()->flash('success', '角色添加成功');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update(['name'=>$request->name, 'title'=>$request->title]);
        session()->flash('success', '成功修改角色');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', '角色删除成功');
        return back();
    }

    public function permission(Role $role) {
        $modules = \HDModule::getPermissionByGuard('admin');
        return view('admin::role.permission', compact('role', 'modules'));
    }

    public function permissionStore(Request $request, Role $role) {
//        dd($request->all());
        $role->syncPermissions($request->name);
        session()->flash('success', '权限设置成功');
        return redirect('/admin/role');
    }

}
