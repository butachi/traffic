<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('user::public.login');
    }

    public function getRegister()
    {
        return view('user::public.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        app('Modules\User\Services\UserRegistration')->register($request->all());

        Flash::success(trans('user::messages.account created check email for activation'));

        return redirect()->route('register');
    }

    public function getReset()
    {
        return view('user::public.reset.begin');
    }
}
