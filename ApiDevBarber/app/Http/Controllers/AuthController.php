<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\AuthFormRequest;
use App\Http\Requests\LoginFormRequest;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['create', 'login']]);
    }

    public function create(AuthFormRequest $request) {
        $array = ['error' => ''];

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $hash;
        $newUser->save();

        // $token = Auth::attemp(...) também funciona
        $token = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if(!$token) {
            $array['error'] = 'Ocorreu um erro!';
            return $array;
        }

        $info = auth()->user();
        $info['avatar'] = url('media/avatars/'.$info['avatar']);
        $array['data'] = $info;
        $array['token'] = $token;

        return $array;
    }

    public function login(LoginFormRequest $request) {
        $array = ['error' => ''];

        $email = $request->email;
        $password = $request->password;

        $token = auth()->attempt([
            'email' => $email,
            'password' => $password,
        ]);

        if(!$token) {
            $array['error'] = 'Usuario e/ou senha errados!';
            return $array;
        }

        $info = auth()->user();
        $info['avatar'] = url('media/avatars/'.$info['avatar']);
        $array['data'] = $info;
        $array['token'] = $token;
        return $array;
    }

    public function logout() {
        auth()->logout();
        return ['error' => ''];
    }

    public function refresh() {
        $array = ['error' => ''];

        $token = Auth::refresh();

        $info =  auth()->user();
        $info['avatar'] = url('media/avatars/'.$info['avatar']);
        $array['data'] = $info;
        $array['token'] = $token;

        return $array;
    }
}
