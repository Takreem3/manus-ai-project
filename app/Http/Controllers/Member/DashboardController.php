<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // For a real application, you would fetch this data from your database
        // For now, we'll set default values for new users
        $data = [
            'personal_volume' => 0,
            'personal_volume_change' => 0,
            'group_volume' => 0,
            'group_volume_change' => 0,
            'commissions' => 0,
            'commissions_change' => 0,
            'referrals' => 0,
            'referrals_change' => 0,
            'recent_commissions' => [],
            'recent_referrals' => []
        ];
        
        return view('member.dashboard', compact('data'));
    }
}
