<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Socialite;
use Auth;
use Exception;

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


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $check = User::where('email',$user->email)->first();
            if($check){
                Auth::login($check);
                return redirect::to('/');

            }else{
                $userModel = new User;
                $userModel->name = $user->name;
                $userModel->email = $user->email;
                $userModel->save();

                Auth::login($userModel);
                return redirect::to('/');
            }

        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }

    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();

            $check = User::where('email',$user->email)->first();
            if($check){
                Auth::login($check);
                return redirect::to('/');

            }else{
                $userModel = new User;
                $userModel->name = $user->name;
                $userModel->email = $user->email;
                $userModel->save();

                Auth::login($userModel);
                return redirect::to('/');
            }
        } catch (Exception $e) {
            return redirect('auth/linkedin');
        }
    }
}
