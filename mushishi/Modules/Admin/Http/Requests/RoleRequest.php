<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->role ? $this->role->id : null;
        return [
            'name' => 'required|unique:roles,name,'.$id,
            'title' => 'required|unique:roles,title,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标志不能为空',
            'name.unique' => '标志已存在',
            'title.required' => '角色不能为空',
            'title.unique' => '角色已存在'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
