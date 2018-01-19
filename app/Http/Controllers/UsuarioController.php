<?php

namespace App\Http\Controllers;

use App\Http\ResponseUtils;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        if (!$email || !$password) {
            return ResponseUtils::jsonResponse(400, [
                'error' => 'parámetros incompletos'
            ]);
        }

        $usuario = DB::table('user')->where([
            ['email', '=', $email],
            ['password', '=', sha1($password)]
        ])->first();

        if(!$usuario) {
            return ResponseUtils::jsonResponse(400, [
                'error' => 'El usuario no existe'
            ]);
        }

        return ResponseUtils::jsonResponse(200, [
            'id' => $usuario->id,
            'name' => $usuario->name,
            'lastname' => $usuario->lastname,
            'email' => $usuario->email,
        ]);
    }
}
