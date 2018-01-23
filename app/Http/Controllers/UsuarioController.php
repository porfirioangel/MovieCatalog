<?php

namespace App\Http\Controllers;

use App\Http\ResponseUtils;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Shows the view with the login page
     */
    public function loginPage(Request $request) {
        return view('login');
    }

    /**
     * Shows the view with the user info
     */
    public function show(Request $request) {
        return view('profile');
    }

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
