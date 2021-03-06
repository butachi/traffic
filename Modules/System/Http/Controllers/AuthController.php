<?php

namespace Modules\System\Http\Controllers;

use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\System\Http\Requests\LoginRequest;
use Modules\System\Http\Requests\RegisterRequest;

class AuthController extends BasePublicController
{
    public function getLogin()
    {
        return view('system::public.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = (bool) $request->get('remember_me', false);

        $error = $this->auth->login($credentials, $remember);

        if (!$error) {
            Flash::success(trans('user::messages.successfully logged in'));
            return redirect()->intended('/');
        }

        Flash::error($error);

        return redirect()->back()->withInput();
    }

    public function getRegister()
    {
        return view('system::public.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        app('Modules\System\Services\UserRegistration')->register($request->all());

        Flash::success(trans('user::messages.account created check email for activation'));

        return redirect()->route('register');
    }

    public function getReset()
    {
        return view('system::public.reset.begin');
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect()->route('login');
    }
}
