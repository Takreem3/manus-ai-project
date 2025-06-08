<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('member.dashboard');
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the products page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {
        return view('products');
    }

    /**
     * Show the commission plans page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function commissionPlans()
    {
        return view('commission-plans');
    }

    /**
     * Show the calculator page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function calculator()
    {
        return view('calculator');
    }
}
