<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    public function getLoginPage ()
    {
        return view("auth.login");
    }

    public function postLoginPage (LoginRequest $request)
    {
        $validation = Auth::guard('Admin')->attempt([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
        ]);

        if($validation) {
            return redirect("backend/index");
        } else {
            return redirect("backend/login")->with("error_message", "Wrong Credential!!!")->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect("backend/login");
    }
}
