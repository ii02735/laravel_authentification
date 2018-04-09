<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function chgName(Request $request)
    {
        $this->validate($request,[
            "nom"=>"bail|required|alpha"
        ]);

        $utilisateur = Auth::user();
        $utilisateur->update(['nom'=>$request->input('nom')]);

        return back();
    }

    public function chgFirstname(Request $request)
    {
        $this->validate($request,[
            "prenom"=>"bail|required|alpha"
        ]);

        $utilisateur = Auth::user();
        $utilisateur->update(['prenom'=>$request->input('prenom')]);

        return back();
    }

    public function chgAddr(Request $request)
    {
        $this->validate($request,[
            "address"=>"bail|required|string"
        ]);

        $utilisateur = Auth::user();
        $utilisateur->update(['address'=>$request->input('address')]);

        return back();
    }

    public function chgNumTel(Request $request)
    {
        $this->validate($request,[
            "phone_number"=>"bail|required|digits:10"
        ]);

        $utilisateur = Auth::user();
        $utilisateur->update(['phone_number'=>$request->input('phone_number')]);

        return back();
    }

    public function chgEmail(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        $utilisateur = Auth::user();
        $utilisateur->update(['email'=>$request->input('email'),'token'=>str_random(25),'changeAddress'=>true]);

        $utilisateur->envoyerMailChangement();

        return back();
    }

    public function chgPassword(Request $request)
    {
        
        if (!(Hash::check($request->input('password_old'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Le mot de passe ne correspond pas à l'ancien");
        }

        if(strcmp($request->input('password_old'), $request->input('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Vous ne pouvez pas saisir le même mot de passe que l'ancien");
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $utilisateur = Auth::user();
        $utilisateur->password = Hash::make($request->input('password'));
        $utilisateur->save();

        return redirect()->back()->with("success","Mot de passe changé avec succès !");
    }
}
