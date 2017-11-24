<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends ApiController
{
    // 登录用户名标示为phone字段
    public function username()
    {
        return 'name';
    }

    //登录接口，调用了ApiController中一些其他函数succeed\failed，上文未提及，用于接口格式化输出
    public function login(Request $request)
    {


        $credentials = $this->credentials($request);

        if ($this->guard('api')->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        return $this->failed('login failed', 401);

    }

    public function aa(Request $request)
    {


        return $request;
    }
}
