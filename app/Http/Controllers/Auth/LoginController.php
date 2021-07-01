<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectToProvider($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }

    // public function handleProviderCallback($provider)
    // {
    //     $socialiteUser = Socialite::driver($provider)->user();

    //     $user = User::firstOrCreate(
    //         [
    //             'provider_id' => $socialiteUser->getId(),
    //             'provider' => $provider
    //         ],
    //         [
    //             'email' => $socialiteUser->getEmail(),
    //             'name' => $socialiteUser->getName(),
    //             'email_verified_at' => \Carbon\Carbon::now()
    //         ]
    //     );

    //     $user->update(['api_token', Str::random(80)]);

    //     auth()->login($user, true);

    //     return redirect('/');
    // }
}
