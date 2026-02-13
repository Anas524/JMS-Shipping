<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterAdminController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $subs = NewsletterSubscriber::query()
            ->when($q, fn($qq) => $qq->where('email', 'like', "%{$q}%"))
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.newsletter.index', compact('subs', 'q'));
    }

    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();
        return back()->with('status', 'Subscriber deleted.');
    }
}
