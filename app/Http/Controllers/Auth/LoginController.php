<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    public $maxAttempts = 3;
    public $decayMinutes = 30;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('throttle')->only('login');
    }

    public function redirectTo()
    {

        if (Auth::user()->hasRole('customer_admin')) {
            return '/customer-admin';
        }
        if (Auth::user()->hasRole('admin')) {
            return '/admin';
        }
        if (Auth::user()->hasRole('customer')) {
            return '/customer';
        }
    }
}
