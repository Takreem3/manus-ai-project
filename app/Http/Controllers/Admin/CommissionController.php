<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Commission\UnilevelCommissionEngine;
use App\Services\Commission\BinaryCommissionEngine;
use App\Services\Commission\MatrixCommissionEngine;

class CommissionController extends Controller
{
    public function settings()
    {
        // Get commission settings
        $unilevel = new UnilevelCommissionEngine();
        $binary = new BinaryCommissionEngine();
        $matrix = new MatrixCommissionEngine();
        
        return view('admin.commissions.settings', [
            'unilevel' => $unilevel->getSettings(),
            'binary' => $binary->getSettings(),
            'matrix' => $matrix->getSettings(),
        ]);
    }
    
    public function updateSettings(Request $request)
    {
        $type = $request->input('type');
        $settings = $request->input('settings');
        
        switch ($type) {
            case 'unilevel':
                $engine = new UnilevelCommissionEngine();
                break;
            case 'binary':
                $engine = new BinaryCommissionEngine();
                break;
            case 'matrix':
                $engine = new MatrixCommissionEngine();
                break;
            default:
                return redirect()->back()->with('error', 'Invalid commission type');
        }
        
        $engine->setSettings($settings);
        // In a real application, you would save these settings to the database
        
        return redirect()->back()->with('success', 'Commission settings updated successfully');
    }
    
    public function reports()
    {
        // Get commission reports
        return view('admin.commissions.reports');
    }
}
