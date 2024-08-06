<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator=Validator::make(
            $request->all(),
            [
                'email'=>['required','string','email'],
                'password'=>['required','string']
            ]
            );
            if ($validator->fails()){
                return response()->json(['error'=>$validator->errors()],422);
            }

            $credentials = $request->only('email','password');
            $token = auth()->attempt($credentials);
            //dd($request);
            if (!$token){
                return response()->json(["message" => "Informations de connexion incorrectes"], 401);
            }
            return response()->json([
                "access_token" => $token,
                "token_type" => "bearer",
                "user" => auth()->user(),
                "expires_in" => env("JWT_TTL") * 60 . "seconds"
            ]);
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(["message"=>"Déconnexion reussie"]);
    }
    public function refresh()
    {
        $token = auth()->refresh();
        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "user" => auth()->user(),
            "expires_in" => env("JWT_TTL") * 60 . "seconds"
        ]);  
    }
}
