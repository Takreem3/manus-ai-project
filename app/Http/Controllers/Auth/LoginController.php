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
    
    // Override the authenticated method to handle verification status
    protected function authenticated(Request $request, $user)
    {
        // Check if user is admin - admins bypass verification check
        if ($user->hasRole('admin')) {
            return redirect()->intended(route('admin.dashboard'));
        }
        
        // For regular members, check if user is verified
        if (!$user->kyc_verified || !$user->payment_verified) {
            // Instead of logging out, redirect to pending verification page
            return redirect()->route('verification.pending')
                ->with('status', 'Your account is pending verification. Please wait for admin approval.');
        }
        
        return redirect()->intended($this->redirectPath());
    }
}
