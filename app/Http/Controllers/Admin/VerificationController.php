<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('kyc_verified', false)
            ->orWhere('payment_verified', false)
            ->get();
            
        return view('admin.verifications.index', compact('pendingUsers'));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.verifications.show', compact('user'));
    }
    
    public function verify(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'kyc_verified' => 'required|boolean',
            'payment_verified' => 'required|boolean',
        ]);
        
        $user->kyc_verified = $request->kyc_verified;
        $user->payment_verified = $request->payment_verified;
        $user->save();
        
        return redirect()->route('admin.verifications.index')
            ->with('success', 'User verification status updated successfully');
    }
}
