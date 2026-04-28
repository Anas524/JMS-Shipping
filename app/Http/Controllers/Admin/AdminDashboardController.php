<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\NewsletterSubscriber;
use App\Models\ResourcePost;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $stats = [
            'total_inquiries'   => Inquiry::count(),
            'unread_count'      => Inquiry::where('is_read', 0)->count(),
            'newsletter_count'  => NewsletterSubscriber::count(),
            'today_count'       => Inquiry::whereDate('created_at', $today)->count()
                + NewsletterSubscriber::whereDate('created_at', $today)->count(),
            'resources_count' => ResourcePost::count(),
            'published_resources_count' => ResourcePost::where('is_published', true)->count(),
        ];

        $recentInquiries = Inquiry::latest()->take(6)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries'));
    }
}
