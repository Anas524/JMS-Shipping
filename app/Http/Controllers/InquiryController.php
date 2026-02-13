<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', 'in:contact,quote,resource'],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],

            // quote optional
            'origin' => ['nullable', 'string', 'max:255'],
            'destination' => ['nullable', 'string', 'max:255'],
            'shipment_type' => ['nullable', 'string', 'max:50'],
            'weight' => ['nullable', 'numeric'],
            'dimensions' => ['nullable', 'string', 'max:100'],
            'incoterm' => ['nullable', 'string', 'max:50'],
        ]);

        $data['page_url'] = $request->fullUrl();
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = substr((string) $request->userAgent(), 0, 500);

        Inquiry::create($data);

        return back()->with('status', 'Thanks! We received your request.');
    }
}
