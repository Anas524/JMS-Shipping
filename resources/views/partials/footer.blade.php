<footer class="relative bg-white overflow-hidden">
  <!-- Background (White + Watermark Logo) -->
  <div class="absolute inset-0 z-0 pointer-events-none">
    <!-- soft grid (very light) -->
    <div class="absolute inset-0 opacity-40"
      style="background-image: linear-gradient(rgba(2,6,23,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(2,6,23,0.04) 1px, transparent 1px);
              background-size: 90px 90px;"></div>

    <!-- soft glow blobs -->
    <div class="absolute -top-24 left-1/4 w-[520px] h-[520px] bg-cyan-400/10 rounded-full blur-[140px]"></div>
    <div class="absolute -bottom-28 right-1/4 w-[520px] h-[520px] bg-blue-500/10 rounded-full blur-[140px]"></div>

    <!-- watermark logo (bottom-right) -->
    <img
      src="{{ asset('images/logo.png') }}"
      alt=""
      class="absolute -bottom-10 -right-6 w-[620px] max-w-none opacity-[0.06] select-none" />
    <!-- style="filter: grayscale(100%);" if you need grayshade without color use this -->
  </div>

  <!-- Top Wave -->
  <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-cyan-500/50 to-transparent"></div>

  <!-- Main Footer Content -->
  <div class="relative z-10 max-w-7xl mx-auto px-4 pt-20 pb-10">

    <!-- Newsletter Section -->
    <div class="relative bg-white border border-slate-200 rounded-3xl p-8 md:p-12 mb-16 overflow-hidden shadow-[0_18px_60px_rgba(2,6,23,0.08)]">
      <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%2306b6d4%22%20fill-opacity%3D%220.05%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>

      <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="text-center md:text-left">
          <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Stay Updated</h3>
          <p class="text-slate-600">Subscribe to our newsletter for logistics insights and updates.</p>
        </div>
        <div class="relative w-full md:w-auto">
          <form id="newsletterForm"
            action="{{ route('newsletter.store') }}"
            method="POST"
            class="relative flex flex-col sm:flex-row w-full md:w-auto gap-3">
            @csrf
            <input type="hidden" name="source" value="footer">

            <input type="email" name="email" required placeholder="Enter your email"
              class="w-full flex-1 md:w-80 px-5 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:border-cyan-500 transition-colors">

            <button type="submit"
              class="w-full sm:w-auto px-6 py-3 bg-cyan-500 text-white font-semibold rounded-xl hover:bg-cyan-400 transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/25 whitespace-nowrap">
              Subscribe
            </button>

          </form>

          {{-- message (won't push layout) --}}
          <div id="newsletterMsg"
            class="pointer-events-none absolute left-0 right-0 -bottom-6 text-center text-sm hidden">
          </div>
        </div>

      </div>
    </div>

    <!-- Footer Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 mb-16">

      <!-- Brand Column -->
      <div class="col-span-2 md:col-span-4 lg:col-span-1 mb-8 lg:mb-0">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 mb-6 group">
          <div class="relative shrink-0">
            <div class="absolute inset-0 bg-cyan-500 blur-lg opacity-30 group-hover:opacity-50 transition-opacity"></div>

            <img
              src="{{ asset('images/3dlogo.png') }}"
              alt="JMS"
              class="footer-logo relative h-12 w-auto object-contain">
          </div>

          <span class="text-xl font-bold text-slate-900">JMS Shipping LLC</span>
        </a>
        <p class="text-slate-600 text-sm leading-relaxed mb-6">
          Your trusted partner in global logistics. Moving businesses forward with innovative shipping solutions.
        </p>

        <!-- Social Icons -->
        <div class="flex items-center gap-4">
          <a href="#" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-cyan-500 hover:text-white transition-all duration-300 hover:-translate-y-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
              <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-cyan-500 hover:text-white transition-all duration-300 hover:-translate-y-1" aria-label="X (Twitter)">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M18.244 2H21l-6.55 7.49L22.5 22h-6.6l-5.16-6.72L4.9 22H2.1l7.02-8.03L1.5 2H8.25l4.66 6.1L18.244 2Zm-1.16 18h1.53L7.43 3.9H5.8L17.084 20Z" />
            </svg>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-cyan-500 hover:text-white transition-all duration-300 hover:-translate-y-1" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
            </svg>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-cyan-500 hover:text-white transition-all duration-300 hover:-translate-y-1">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Services -->
      <div>
        <h4 class="text-slate-900 font-bold mb-6 flex items-center gap-2">
          <span class="w-8 h-px bg-cyan-500"></span>
          Services
        </h4>
        <ul class="space-y-3">
          <li><a href="{{ route('services') }}#airFreight" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Air Freight</a></li>
          <li><a href="{{ route('services') }}#seaFreight" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Sea Freight</a></li>
          <li><a href="{{ route('services') }}#landTransport" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Land Transport</a></li>
          <li><a href="{{ route('services') }}#customs" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Customs</a></li>
          <li><a href="{{ route('services') }}#projectCargo" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Project Cargo</a></li>
        </ul>
      </div>

      <!-- Company -->
      <div>
        <h4 class="text-slate-900 font-bold mb-6 flex items-center gap-2">
          <span class="w-8 h-px bg-cyan-500"></span>
          Company
        </h4>
        <ul class="space-y-3">
          <li><a href="{{ route('about') }}" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>About Us</a></li>
          <li><a href="{{ route('resources') }}" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Resources</a></li>
          <!-- <li><a href="" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Careers</a></li> -->
          <li><a href="{{ route('contact') }}" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Contact</a></li>
        </ul>
      </div>

      <!-- Support -->
      <div>
        <h4 class="text-slate-900 font-bold mb-6 flex items-center gap-2">
          <span class="w-8 h-px bg-cyan-500"></span>
          Support
        </h4>
        <ul class="space-y-3">
          <li><a href="#" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Help Center</a></li>
          <!-- <li><a href="#" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Track Shipment</a></li> -->
          <li><a href="{{ route('privacy') }}" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Privacy Policy</a></li>
          <li><a href="{{ route('terms') }}" class="text-slate-600 hover:text-cyan-400 transition-colors text-sm flex items-center gap-2 group"><span class="w-0 group-hover:w-2 h-px bg-cyan-400 transition-all duration-300"></span>Terms of Service</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h4 class="text-slate-900 font-bold mb-6 flex items-center gap-2">
          <span class="w-8 h-px bg-cyan-500"></span>
          Contact
        </h4>
        <ul class="space-y-4">
          <li class="flex items-start gap-3 text-slate-600 text-sm">
            <svg class="w-5 h-5 text-cyan-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span>
              Suite #03-05, 22A Street,<br>
              Al Khabaishi, Dubai, UAE
            </span>
          </li>
          <li class="flex items-center gap-3 text-slate-600 text-sm">
            <svg class="w-5 h-5 text-cyan-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <a href="tel:+97145784156" class="hover:text-cyan-400 transition-colors">+971 4 5784156</a>
          </li>
          <li class="flex items-center gap-3 text-slate-600 text-sm">
            <svg class="w-5 h-5 text-cyan-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <a href="mailto:info@jmsshipping.com" class="hover:text-cyan-400 transition-colors">info@jmsshipping.com</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="relative pt-8 border-t border-slate-200">
      <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="text-slate-500 text-sm">
          © {{ date('Y') }} JMS Shipping LLC. All rights reserved. Built with precision in Dubai.
        </div>

        <div class="flex items-center gap-6 text-sm md:pr-10">
          <a href="" class="text-slate-500 hover:text-cyan-400 transition-colors">Privacy</a>
          <a href="" class="text-slate-500 hover:text-cyan-400 transition-colors">Terms</a>
          <a href="/contact#map" class="text-slate-500 hover:text-cyan-400 transition-colors">Sitemap</a>
        </div>
      </div>
    </div>
  </div>
</footer>