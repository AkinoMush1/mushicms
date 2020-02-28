<?php

// email 设置可为空
// request 和 response 都是 json 格式
// api_token 设置可插入数据库

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login', 'register');
    }

    protected function username()
    {
        return 'email';
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $api_token = Str::random(80);
        $data = array_merge($request->all(), compact('api_token'));
        $this->create($data);

        return compact('api_token');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255', 'unique:users',],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
//        等效于
//        $request->validate([
//            ....
//        ])
    }

    protected function create(array $data)
    {
        // 实际上，属性值是否可以批量赋值需要受 fillable 或 guarded 来控制，如果我们想要强制批量赋值可以使用 forceCreate
        return User::forceCreate([
//            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'api_token' => hash('sha256', $data['api_token']),
        ]);
    }

    public function logout()
    {
        // web登出是Auth::logout()
        auth()->user()->update(['api_token' => null]);

        return ['message' => '退出登录成功'];
    }

    public function login()
    {
        $user = User::where($this->username(), request($this->username()))
            ->firstOrFail();

        // 将request('password')哈希后与$user->password进行比对
        if (!password_verify(request('password'), $user->password)) {
            return response()->json(['error' => '抱歉，账号名或者密码错误！'],
                403);
        }

        $api_token = Str::random(80);
        $user->update(['api_token' => hash('sha256', $api_token)]);

        return compact('api_token');
    }

    public function refresh()
    {
        $api_token = Str::random(80);
        auth()->user()->update(['api_token' => hash('sha256', $api_token)]);

        return compact('api_token');
    }
}