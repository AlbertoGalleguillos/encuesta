<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function auth(Request $request)
    {
        $user = User::where([
            'nombre_usuario' => $request->username,
            'clave' => $request->password,
            'visible' => true
        ])->first();

        if ($user) {
            return $user;
        } else {
            return Response('Usuario y/o contraseña incorrectos', Response::HTTP_FORBIDDEN);
        }

    }
}