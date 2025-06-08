<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the pending verification page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pending()
    {
        return view('verification.pending');
    }
}
