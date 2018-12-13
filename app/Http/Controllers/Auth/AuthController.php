<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]); //na svim metodama osim na login jer i dalje nemamo token tek ga trazimo
    }

    public function login(Request $request) 
    {
        $credentials = $request->only(['email','password']); //ne prosledjujemo sve vec samo email i password jer nam nije potrebno
        //generisi mi ovaj token za ovaj email i password koji si dobio
        $token = auth()->attempt($credentials);

        if(!$token) {
            return response()->json([
                'message' => 'You are not authorized!' //dobijamo json objekat
            ], 401);  //drugi 401 je opcioni parametar
        }

        return response()->json([
            'token' => $token,
            'type' => 'bearer', //ovo je tip tokena koji smo kreirali
            'expires_in' => auth()->factory()->getTTL() * 60, //vraca u sekundi
            'user' => auth()->user() //vracamo usera sa njegovim podacima da ne bi frontend pozivao jos jedan request me()
        ]);
    }


}
