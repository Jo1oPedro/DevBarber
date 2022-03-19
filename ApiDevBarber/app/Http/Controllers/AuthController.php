<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\AuthFormRequest;

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

        $token = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        if(!$token) {
            $array['error'] = 'Ocorreu um erro!';
            return $array;
        }

        $info = auth()->user();
        $array['data'] = $info;
        $array['token'] = $token;

        return $array;
    }
}
