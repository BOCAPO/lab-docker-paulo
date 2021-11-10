<?php

namespace Invoque\Hermes\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Invoque\Hermes\Http\Requests\AuthRequest;
use Invoque\Zeus\Controllers\BaseController;

class AuthController extends BaseController
{
    use AuthenticatesUsers;

    protected $auth, $app;

    protected $redirectTo = '/';

    public function __construct(Guard $auth, Application $app)
    {
        $this->auth = $auth;
        $this->app = $app;
    }

    public function login()
    {
        return view('Hermes::auth.login');
    }

    public function postLogin(AuthRequest $request)
    {
        if ($this->auth->attempt($this->credentials($request), $request->has('remember'))) {
            //REALIZA CACHE USUARIO
            Session::put('permissions',\Auth::guard()->user()->profiles->prf_permission);

            return redirect()->intended('/');
        }

        return redirect('/login')
            ->withInput($request->only('usr_username', 'remember'))
            ->withErrors(['Usuário e/ou senha inválidos.']);
    }

    protected function credentials(Request $request)
    {
        return [
            'usr_username' => $request->input('usr_username'),
            'password' => $request->input('usr_password'),
            'usr_active' => true
        ];
    }

    public function getLogout()
    {
        $this->auth->logout();
        return redirect('/login');
    }
}
