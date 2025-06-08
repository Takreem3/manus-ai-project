<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // Override the authenticated method to check verification status
    protected function authenticated(Request $request, $user)
    {
        // Check if user is verified
        if (!$user->kyc_verified || !$user->payment_verified) {
            auth()->logout();
            return back()->with('status', 'Your account is pending verification. Please wait for admin approval.');
        }
        
        return redirect()->intended($this->redirectPath());
    }
}
