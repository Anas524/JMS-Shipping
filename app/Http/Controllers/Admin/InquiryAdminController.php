<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryAdminController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type'); // contact|quote|null
        $read = $request->get('read'); // 0|1|null
        $q    = $request->get('q');

        $items = Inquiry::query()
            ->when($type, fn($qq) => $qq->where('type', $type))
            ->when($read !== null && $read !== '', fn($qq) => $qq->where('is_read', (bool)$read))
            ->when($q, function ($qq) use ($q) {
                $qq->where(function($x) use ($q){
                    $x->where('name','like',"%{$q}%")
                      ->orWhere('email','like',"%{$q}%")
                      ->orWhere('phone','like',"%{$q}%")
                      ->orWhere('subject','like',"%{$q}%");
                });
            })
            ->orderBy('is_read')       // unread first
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.inquiries.index', compact('items','type','read','q'));
    }

    public function show(Inquiry $inquiry)
    {
        // Auto mark read when opened
        if (!$inquiry->is_read) {
            $inquiry->update(['is_read' => true, 'read_at' => now()]);
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function markRead(Inquiry $inquiry)
    {
        $inquiry->update(['is_read' => true, 'read_at' => now()]);
        return back()->with('status', 'Marked as read.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return back()->with('status', 'Inquiry deleted.');
    }
}
