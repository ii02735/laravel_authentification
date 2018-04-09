<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user,$provider);
	Auth::login($authUser,true);
	return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user,$provider)
    {
	$authUser = User::where('provider_id',$user->id)->first();
	if($authUser)
	    return $authUser;
	return User::create([
		'nom' => $user->name,
		'prenom' => 'null',
		'phone_number' => 'null',
		'email' => $user->email,
		'provider'=>$provider,
		'provider_id'=> $user->id,
		'password'=>'FacebookPassword'
	]);
    }
}
