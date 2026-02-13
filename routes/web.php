<?php

use App\Http\Controllers\Admin\InquiryAdminController;
use App\Http\Controllers\Admin\NewsletterAdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\InquiryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require __DIR__ . '/auth.php';

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/resources', 'pages.resources')->name('resources');
Route::view('/contact', 'pages.contact')->name('contact');
// Route::view('/quote', 'pages.quote')->name('quote');

Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/newsletter', [NewsletterAdminController::class, 'index'])->name('newsletter.index');
    Route::delete('/newsletter/{subscriber}', [NewsletterAdminController::class, 'destroy'])->name('newsletter.destroy');

    Route::get('/inquiries', [InquiryAdminController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [InquiryAdminController::class, 'show'])->name('inquiries.show');
    Route::patch('/inquiries/{inquiry}/read', [InquiryAdminController::class, 'markRead'])->name('inquiries.read');
    Route::delete('/inquiries/{inquiry}', [InquiryAdminController::class, 'destroy'])->name('inquiries.destroy');
    Route::get('/newsletter/export', [NewsletterController::class, 'export'])
        ->name('newsletter.export');
});

Route::post('/admin/login-ajax', function (Request $request) {

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $remember = $request->boolean('remember');

    if (!Auth::attempt($credentials, $remember)) {
        return response()->json([
            'ok' => false,
            'message' => 'Invalid email or password.',
        ], 422);
    }

    $request->session()->regenerate();

    // if you want ONLY admins to login from this panel:
    $user = Auth::user();

    if (!$user) {
        Auth::logout();
        return response()->json([
            'ok' => false,
            'message' => 'You do not have admin access.',
        ], 403);
    }

    return response()->json([
        'ok' => true,
        'redirect' => route('admin.dashboard'),
    ]);
})->middleware('guest')->name('admin.login.ajax');
