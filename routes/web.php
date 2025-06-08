<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/commission-plans', [HomeController::class, 'commissionPlans'])->name('commission-plans');
Route::get('/calculator', [HomeController::class, 'calculator'])->name('calculator');

// Authentication routes
Auth::routes(['verify' => true]);

// Registration with sponsor
Route::get('/register/{sponsor}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationFormWithSponsor'])->name('register.sponsor');

// Home route (redirects based on role)
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Admin Login Routes
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Admin Verification Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/verifications', [App\Http\Controllers\Admin\VerificationController::class, 'index'])->name('admin.verifications.index');
    Route::get('/verifications/{id}', [App\Http\Controllers\Admin\VerificationController::class, 'show'])->name('admin.verifications.show');
    Route::post('/verifications/{id}', [App\Http\Controllers\Admin\VerificationController::class, 'verify'])->name('admin.verifications.verify');
});

    // User management routes
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('admin.users.index');
    
    // Commission settings routes
    Route::get('/commission', function () {
        return view('admin.commission.index');
    })->name('admin.commission.index');
    // Admin Commission Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/commissions/settings', [App\Http\Controllers\Admin\CommissionController::class, 'settings'])->name('admin.commissions.settings');
    Route::post('/commissions/settings', [App\Http\Controllers\Admin\CommissionController::class, 'updateSettings'])->name('admin.commissions.update-settings');
    Route::get('/commissions/reports', [App\Http\Controllers\Admin\CommissionController::class, 'reports'])->name('admin.commissions.reports');
});

// Member Commission Routes
Route::prefix('member')->middleware(['auth'])->group(function () {
    Route::get('/commissions', [App\Http\Controllers\Member\CommissionController::class, 'index'])->name('member.commissions.index');
    Route::get('/commissions/calculator', [App\Http\Controllers\Member\CommissionController::class, 'calculator'])->name('member.commissions.calculator');
    Route::post('/commissions/calculate', [App\Http\Controllers\Member\CommissionController::class, 'calculate'])->name('member.commissions.calculate');
});

    
    // Payout routes
    Route::get('/payouts', function () {
        return view('admin.payouts.index');
    })->name('admin.payouts.index');
    
    // Reports routes
    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('admin.reports.index');
});

// Member routes
Route::prefix('member')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('member.dashboard');
    
    // Profile routes
    Route::get('/profile', function () {
        return view('member.profile');
    })->name('member.profile');
    
    // Genealogy routes
    Route::get('/genealogy', function () {
        return view('member.genealogy');
    })->name('member.genealogy');
    
    // Commission routes
    Route::get('/commissions', function () {
        return view('member.commissions.index');
    })->name('member.commissions');
    
    // Commission calculator
    Route::get('/commissions/calculator', function () {
        return view('member.commissions.calculator');
    })->name('member.commissions.calculator');
    
    // Referral routes
    Route::get('/referrals', function () {
        return view('member.referrals.index');
    })->name('member.referrals');
    
    // Generate referral links
    Route::get('/referrals/links/generate', function () {
        return view('member.referrals.generate');
    })->name('member.referrals.links.generate');
    
    // Shop routes
    Route::get('/shop', function () {
        return view('member.shop.index');
    })->name('member.shop');
    
    // Wallet routes
    Route::get('/wallet/withdraw', function () {
        return view('member.wallet.withdraw');
    })->name('member.wallet.withdraw');
});
