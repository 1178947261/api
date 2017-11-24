<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use  AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('client');
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        return $this->authenticated($request);
    }

    //以下为重写部分

    protected function authenticated(Request $request)
    {
        return $this->authenticateClient($request);
    }

    protected function authenticateClient(Request $request)
    {
        $credentials = $this->credentials($request);

        $data = $request->all();

        $request->request->add([
            'grant_type' => $data['grant_type'],
            'client_id' => $data['client_id'],
            'client_secret' => $data['client_secret'],
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'scope' => ''
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $response = \Route::dispatch($proxy);

        return $response;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $msg = $request['errors'];
        $code = $request['code'];
        return $this->failed($msg, $code);
    }

}