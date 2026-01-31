<footer class="border-t border-slate-200 mt-16">
  <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-8 text-sm">
    <div>
      <div class="font-bold text-base">JMS</div>
      <p class="text-slate-600 mt-2">Logistics & Freight Solutions (Air, Sea, Land, Customs).</p>
    </div>

    <div>
      <div class="font-semibold">Company</div>
      <div class="mt-3 flex flex-col gap-2">
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('blog') }}">Resources</a>
      </div>
    </div>

    <div>
      <div class="font-semibold">Support</div>
      <div class="mt-3 flex flex-col gap-2">
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('privacy') }}">Privacy Policy</a>
        <a href="{{ route('terms') }}">Terms</a>
      </div>
    </div>

    <div>
      <div class="font-semibold">Contact</div>
      <div class="mt-3 text-slate-600 space-y-2">
        <div>Phone: +971 …</div>
        <div>Email: info@…</div>
        <div>Dubai, UAE</div>
      </div>
    </div>
  </div>

  <div class="text-center text-xs text-slate-500 pb-6">
    © {{ date('Y') }} JMS. All rights reserved.
  </div>
</footer>
