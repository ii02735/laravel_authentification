<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class VerificationController extends Controller
{
    /**
     * Vérifie l'utilisteur avec le token fourni
     *
     * @param  string token
     * @return Response
     */
    public function verifier($token)
    {
        $utilisateur = User::where('token',$token)->firstOrFail();
        $utilisateur->update(['token' => null]); //L'utilisateur sera ainsi vérifié si on met son jeton à null
        return redirect('/home');
    }

    public function verifier2($token)
    {
        $utilisateur = User::where('token',$token)->firstOrFail();
        $utilisateur->update(['token' => null]); //L'utilisateur sera ainsi vérifié si on met son jeton à null
        $utilisateur->update(['changeAddress'=>0]);
        return redirect('/home');
    }
}
