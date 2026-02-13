<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255', 'lowercase'],
            'source' => ['nullable', 'string', 'max:50'],
        ]);

        $email = strtolower($data['email']);

        NewsletterSubscriber::updateOrCreate(
            ['email' => $email],
            [
                'source'     => $data['source'] ?? null,
                'ip_address' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 500),
            ]
        );

        return response()->json([
            'ok' => true,
            'message' => 'Subscribed successfully'
        ]);
    }

    public function export(Request $request): StreamedResponse
    {
        // Optional: keep export consistent with your search filter (?q=)
        $q = trim((string) $request->query('q', ''));

        $query = \App\Models\NewsletterSubscriber::query(); // <-- change model name if yours is different

        if ($q !== '') {
            $query->where('email', 'like', "%{$q}%");
        }

        $subs = $query->orderByDesc('created_at')->get(['email', 'source', 'created_at']);

        $filename = 'newsletter-subscribers-' . now()->format('Y-m-d_H-i') . '.csv';

        return response()->streamDownload(function () use ($subs) {
            $out = fopen('php://output', 'w');

            // CSV header row
            fputcsv($out, ['Email', 'Source', 'Subscribed At']);

            foreach ($subs as $s) {
                fputcsv($out, [
                    $s->email,
                    $s->source ?? 'Website',
                    optional($s->created_at)->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Cache-Control' => 'no-store, no-cache',
        ]);
    }
}
