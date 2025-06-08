<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    
    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Check if user is admin
            $user = User::find(Auth::id());
            $isAdmin = false;
            
            foreach ($user->roles as $role) {
                if ($role->name === 'admin') {
                    $isAdmin = true;
                    break;
                }
            }
            
            if ($isAdmin) {
                // If successful and user is admin, redirect to admin dashboard
                return redirect()->intended(route('admin.dashboard'));
            } else {
                // If user is not admin, log them out and redirect back with error
                Auth::logout();
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                    'email' => 'These credentials do not have admin access.',
                ]);
            }
        }
        
        // If unsuccessful, redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}
