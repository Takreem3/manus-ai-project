<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'max:2'],
            'sponsor_id' => ['nullable', 'string', 'max:255'],
            'id_type' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255'],
            'id_document' => ['required', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:2048'],
            'payment_transaction_id' => ['required', 'string', 'max:255'],
            'payment_amount' => ['required', 'numeric', 'min:50'],
        ]);
    }

    protected function create(array $data)
    {
        // Handle file upload
        $idDocumentPath = null;
        if (request()->hasFile('id_document')) {
            $idDocumentPath = request()->file('id_document')->store('id_documents', 'public');
        }
        
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'sponsor_id' => $data['sponsor_id'] ?? null,
            'id_type' => $data['id_type'],
            'id_number' => $data['id_number'],
            'id_document' => $idDocumentPath,
            'kyc_verified' => false, // Will be verified by admin
            'payment_verified' => false, // Will be verified by admin
            'payment_transaction_id' => $data['payment_transaction_id'],
            'payment_amount' => $data['payment_amount'],
            'payment_date' => now(),
            'status' => 'pending',
        ]);
        
        // Assign member role
        $role = Role::where('name', 'member')->first();
        if ($role) {
            $user->roles()->attach($role->id);
        }
        
        return $user;
    }
    
    // Override the register method to customize the response
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));
        
        // Don't auto-login the user
        // $this->guard()->login($user);
        
        return $this->registered($request, $user)
            ?: redirect()->route('login')->with('status', 'Registration successful! Your account is pending approval. You will be able to login once your KYC and payment are verified by an admin.');
    }
}
