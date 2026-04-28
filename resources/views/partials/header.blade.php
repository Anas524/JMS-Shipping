<header id="siteHeader" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 translate-y-0">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <!-- Premium glass wrapper -->
    <div id="headerBar" class="relative mt-3 sm:mt-4 rounded-2xl border border-slate-200/60 bg-white/85 backdrop-blur-xl shadow-[0_10px_40px_rgba(2,6,23,0.12)] transition-all duration-500 hover:shadow-[0_20px_50px_rgba(2,6,23,0.15)]">

      <div class="h-16 sm:h-20 flex items-center justify-between px-3 sm:px-6">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 group">
          <div class="relative overflow-hidden rounded-lg">
            <img src="{{ asset('images/3dlogo.png') }}" alt="JMS Logo"
              class="logo w-auto transition-transform duration-300 group-hover:scale-105">
          </div>

          <span id="brandText" class="font-extrabold text-lg sm:text-xl tracking-tight leading-none">
            <span class="inline-block text-2xl font-extrabold text-transparent bg-clip-text
               bg-[linear-gradient(to_bottom,#E44643_0%,#ff3b30_50%,#2B88CE_50%,#0a84ff_100%)]">
              JMS
            </span>
            <span class="text-slate-900">Shipping</span>
            <span class="hidden sm:inline"> LLC</span>
          </span>
        </a>

        <!-- Right side (mobile) -->
        <div class="md:hidden flex items-center gap-2">
          <!-- Mobile Menu Button -->
          <button id="navBtn" class="relative w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-100 transition-colors" aria-label="Menu">
            <div class="w-6 h-5 relative flex flex-col justify-between">
              <span class="w-full h-0.5 bg-slate-700 rounded-full transition-all duration-300 origin-left" id="navLine1"></span>
              <span class="w-full h-0.5 bg-slate-700 rounded-full transition-all duration-300" id="navLine2"></span>
              <span class="w-full h-0.5 bg-slate-700 rounded-full transition-all duration-300 origin-left" id="navLine3"></span>
            </div>
          </button>
        </div>

        <!-- Desktop Navigation -->
        <nav id="headerNav" class="hidden md:flex items-center gap-2 text-base font-semibold">
          <a class="jms-navlink2" href="{{ route('home') }}"><span class="jms-navline"></span>Home</a>
          <a class="jms-navlink2" href="{{ route('about') }}"><span class="jms-navline"></span>About</a>

          <!-- SERVICES MEGA MENU -->
          <div id="svcRoot" class="relative">
            <button id="svcBtn" type="button" class="jms-navbtn2 inline-flex items-center gap-1.5 group" aria-expanded="false" aria-controls="svcPanel">
              <span class="jms-navline"></span>Services
              <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="svcArrow">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>

            <!-- Backdrop Overlay -->
            <div id="svcOverlay" class="hidden pointer-events-none fixed inset-0 z-40 bg-slate-900/20 backdrop-blur-sm transition-opacity duration-300 opacity-0"></div>

            <!-- Mega Panel -->
            <div id="svcPanel" class="svc-panel fixed z-50 transition-all duration-300" data-state="compact">
              <div class="svc-inner bg-white/95 backdrop-blur-xl rounded-2xl border border-slate-200/60 shadow-[0_25px_80px_rgba(2,6,23,0.25)] overflow-hidden">

                <!-- LEFT: Categories (2 columns x 4 rows) -->
                <aside class="svc-left bg-slate-50/50 p-4 w-[520px] border-r border-slate-200/60">
                  <div class="text-xs font-bold uppercase tracking-wider mb-3 px-1 text-slate-700">
                    Our Services
                  </div>

                  <div class="svc-grid grid grid-cols-2 gap-3">
                    <!-- AOG -->
                    <button class="svc-item is-active w-full text-left" type="button"
                      data-pane="aog" data-href="{{ route('services') }}#aog">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-cyan-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 flex items-center justify-center text-cyan-600 svc-icon">
                          <i class="bi bi-airplane"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">AOG</div>
                          <div class="text-xs text-slate-500">Aircraft on Ground</div>
                        </div>
                      </div>
                    </button>

                    <!-- Ship Chandlers -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="shipchandlers" data-href="{{ route('services') }}#shipChandlers">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-emerald-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600 svc-icon">
                          <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Ship Chandlers</div>
                          <div class="text-xs text-slate-500">Vessel supply</div>
                        </div>
                      </div>
                    </button>

                    <!-- Project Cargo -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="projectcargo" data-href="{{ route('services') }}#projectCargo">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-purple-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-600 svc-icon">
                          <i class="bi bi-truck"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Project Cargo</div>
                          <div class="text-xs text-slate-500">Heavy & oversized</div>
                        </div>
                      </div>
                    </button>

                    <!-- Ship-Spares -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="shipspares" data-href="{{ route('services') }}#shipSpares">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-blue-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 svc-icon">
                          <i class="bi bi-tools"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Ship-Spares</div>
                          <div class="text-xs text-slate-500">Parts logistics</div>
                        </div>
                      </div>
                    </button>

                    <!-- Door to Deck -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="doortodeck" data-href="{{ route('services') }}#doorToDeck">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-amber-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 svc-icon">
                          <i class="bi bi-door-open"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Door to Deck</div>
                          <div class="text-xs text-slate-500">End-to-end</div>
                        </div>
                      </div>
                    </button>

                    <!-- Air & Sea Freight -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="airsea" data-href="{{ route('services') }}#airSeaFreight">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-cyan-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 flex items-center justify-center text-cyan-600 svc-icon">
                          <i class="bi bi-globe2"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Air & Sea Freight</div>
                          <div class="text-xs text-slate-500">Operations</div>
                        </div>
                      </div>
                    </button>

                    <!-- Oil & Gas Project -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="oilgas" data-href="{{ route('services') }}#oilGasProject">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-orange-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 svc-icon">
                          <i class="bi bi-fuel-pump"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Oil & Gas</div>
                          <div class="text-xs text-slate-500">Project logistics</div>
                        </div>
                      </div>
                    </button>

                    <!-- Offshore Logistics -->
                    <button class="svc-item w-full text-left" type="button"
                      data-pane="offshore" data-href="{{ route('services') }}#offshoreLogistics">
                      <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition">
                        <div class="w-10 h-10 rounded-xl bg-slate-200 flex items-center justify-center text-slate-700 svc-icon">
                          <i class="bi bi-water"></i>
                        </div>
                        <div>
                          <div class="font-semibold text-slate-900">Offshore</div>
                          <div class="text-xs text-slate-500">Rigs & platforms</div>
                        </div>
                      </div>
                    </button>
                  </div>

                  <div class="svc-divider my-4 border-t border-slate-200"></div>

                  <div class="flex gap-3">
                    <a class="flex-1 text-center py-2.5 rounded-xl bg-slate-900 text-white font-semibold text-sm hover:bg-slate-800 transition"
                      href="{{ route('services') }}">View All</a>
                    <a class="flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-white transition"
                      href="{{ route('contact') }}">Talk to Expert</a>
                  </div>
                </aside>

                <!-- RIGHT: Content Panes -->
                <section class="svc-right p-6 w-[420px]">
                  <!-- AOG -->
                  <div class="svc-pane is-active" data-pane="aog">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://i.pinimg.com/1200x/87/0f/3a/870f3aa3f4f5fafc7256b5d7dc03f522.jpg"
                        class="w-full h-full object-cover" alt="AOG">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Time-Critical Air Support</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">AOG (Aircraft on Ground)</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Rapid response logistics to reduce aircraft downtime with priority uplift, tracking, and tight coordination.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>Express uplift</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>24/7 coordination</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>Door-to-airport</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>Time-critical handling</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-cyan-600 text-white font-semibold text-sm hover:bg-cyan-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#aog">Learn More</a>
                    </div>
                  </div>

                  <!-- Ship Chandlers -->
                  <div class="svc-pane" data-pane="shipchandlers">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.pexels.com/photos/1117210/pexels-photo-1117210.jpeg"
                        class="w-full h-full object-cover" alt="Ship Chandlers">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Vessel Supply & Support</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Ship Chandlers</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Reliable vessel provisioning with fast sourcing, clear documentation, and timely delivery to port.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-emerald-600"></i><span>Port delivery</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-emerald-600"></i><span>Fast sourcing</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-emerald-600"></i><span>Inventory planning</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-emerald-600"></i><span>Complete paperwork</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-emerald-600 text-white font-semibold text-sm hover:bg-emerald-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#shipChandlers">Learn More</a>
                    </div>
                  </div>

                  <!-- Project Cargo -->
                  <div class="svc-pane" data-pane="projectcargo">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?w=900&q=80"
                        class="w-full h-full object-cover" alt="Project Cargo">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Heavy & Oversized Logistics</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Project Cargo</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Specialized movement for oversized and heavy cargo with routing, permits, and site coordination.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-purple-600"></i><span>Route survey</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-purple-600"></i><span>Permit handling</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-purple-600"></i><span>Heavy-lift planning</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-purple-600"></i><span>Site coordination</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-purple-600 text-white font-semibold text-sm hover:bg-purple-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#projectCargo">Learn More</a>
                    </div>
                  </div>

                  <!-- Ship-Spares -->
                  <div class="svc-pane" data-pane="shipspares">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.pexels.com/photos/1624695/pexels-photo-1624695.jpeg"
                        class="w-full h-full object-cover" alt="Ship Spares">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Critical Parts Logistics</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Ship-Spares</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Fast movement of essential parts with tracking, careful handling, and priority connections.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-blue-600"></i><span>Priority dispatch</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-blue-600"></i><span>Secure packing</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-blue-600"></i><span>End-to-end tracking</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-blue-600"></i><span>On-time delivery</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-blue-600 text-white font-semibold text-sm hover:bg-blue-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#shipSpares">Learn More</a>
                    </div>
                  </div>

                  <!-- Door to Deck -->
                  <div class="svc-pane" data-pane="doortodeck">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.pexels.com/photos/6407524/pexels-photo-6407524.jpeg"
                        class="w-full h-full object-cover" alt="Door to Deck">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">End-to-End Managed Moves</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Door to Deck</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Full service logistics from pickup to final delivery with smooth coordination and visibility.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-amber-600"></i><span>Pickup & delivery</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-amber-600"></i><span>Documentation</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-amber-600"></i><span>Shipment visibility</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-amber-600"></i><span>Dedicated support</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-amber-600 text-white font-semibold text-sm hover:bg-amber-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#doorToDeck">Learn More</a>
                    </div>
                  </div>

                  <!-- Air & Sea Freight -->
                  <div class="svc-pane" data-pane="airsea">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=900&q=80"
                        class="w-full h-full object-cover" alt="Air & Sea Freight">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Global Freight Operations</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Air & Sea Freight</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Flexible freight solutions with reliable routing, competitive rates, and shipment visibility.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>FCL / LCL options</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>Express air uplift</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>Custom routing</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-cyan-600"></i><span>Tracking & updates</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-cyan-600 text-white font-semibold text-sm hover:bg-cyan-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#airSeaFreight">Learn More</a>
                    </div>
                  </div>

                  <!-- Oil & Gas -->
                  <div class="svc-pane" data-pane="oilgas">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.pexels.com/photos/15970032/pexels-photo-15970032.jpeg"
                        class="w-full h-full object-cover" alt="Oil & Gas">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Industrial Project Support</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Oil & Gas Project Logistics</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Coordinated logistics for industrial cargo with compliance, timelines, and careful handling.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-orange-600"></i><span>Project planning</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-orange-600"></i><span>Site coordination</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-orange-600"></i><span>Compliance support</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-orange-600"></i><span>Timely execution</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-orange-600 text-white font-semibold text-sm hover:bg-orange-700 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#oilGasProject">Learn More</a>
                    </div>
                  </div>

                  <!-- Offshore -->
                  <div class="svc-pane" data-pane="offshore">
                    <div class="relative h-32 rounded-xl overflow-hidden mb-4">
                      <img src="https://images.pexels.com/photos/30445637/pexels-photo-30445637.png"
                        class="w-full h-full object-cover" alt="Offshore">
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      <div class="absolute bottom-3 left-3 text-white font-bold">Rigs & Platform Logistics</div>
                    </div>

                    <div class="svc-head mb-4">
                      <h3 class="text-xl font-bold text-slate-900 mb-2">Offshore Logistics</h3>
                      <p class="text-sm text-slate-600 leading-relaxed">
                        Offshore movement support with careful coordination, scheduling, and documentation readiness.
                      </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-slate-700"></i><span>Port coordination</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-slate-700"></i><span>On-time sailing</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-slate-700"></i><span>Documentation ready</span>
                      </div>
                      <div class="flex items-center gap-2 text-sm text-slate-700">
                        <i class="bi bi-check2-circle text-slate-700"></i><span>Dedicated support</span>
                      </div>
                    </div>

                    <div class="svc-actions flex gap-3">
                      <a class="svc-cta flex-1 text-center py-2.5 rounded-xl bg-slate-900 text-white font-semibold text-sm hover:bg-slate-800 transition-colors"
                        href="{{ route('contact') }}#quoteForm">Get Quote</a>
                      <a class="svc-ghost flex-1 text-center py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-colors"
                        href="{{ route('services') }}#offshoreLogistics">Learn More</a>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>

          <a class="jms-navlink2" href="{{ route('resources') }}"><span class="jms-navline"></span>Resources</a>
          <a class="jms-navlink2" href="{{ route('contact') }}"><span class="jms-navline"></span>Contact</a>

          <a id="headerCta" href="{{ route('contact') }}#quoteForm"
            class="ml-2 inline-flex items-center gap-2 rounded-xl bg-slate-900 text-white px-4 py-2.5 font-semibold shadow-lg hover:bg-slate-800 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
            <i class="bi bi-chat-left-text"></i>
            <span class="hidden lg:inline">Get a Quote</span>
          </a>

          {{-- Modern Mega Menu Account Button --}}
          <div class="relative hidden md:block" id="accountMegaMenu">
            <button id="accountTrigger" type="button"
              class="group relative ml-2 inline-flex items-center justify-center w-11 h-11 rounded-xl overflow-hidden transition-all duration-500 hover:scale-105"
              aria-label="Account Menu">

              {{-- Animated Background --}}
              <div class="absolute inset-0 bg-gradient-to-br bg-white opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=" 20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" %3E%3Cg fill="%23ffffff" fill-opacity="0.05" %3E%3Ccircle cx="3" cy="3" r="3" /%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>

              {{-- Glow Effect --}}
              <div class="absolute -inset-1 bg-gradient-to-r from-cyan-200 via-sky-200 to-blue-200 rounded-xl blur-lg opacity-0 group-hover:opacity-60 transition duration-500"></div>

              {{-- Icon --}}
              <i class="bi bi-person-fill relative z-10 text-black text-lg transition-transform duration-300 group-hover:rotate-12"></i>
            </button>

          </div>
        </nav>
      </div>
    </div>

    <!-- Mobile Menu - Slide Over -->
    <div id="mobileNav" class="fixed inset-0 z-40 hidden">
      <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity opacity-0" id="mobileBackdrop"></div>

      <div class="absolute right-0 top-0 h-full w-[80%] max-w-sm bg-white shadow-2xl transform translate-x-full transition-transform duration-300" id="mobileMenu">
        <div class="p-6 h-full flex flex-col">
          <div class="mobile-header flex items-center justify-between mb-8">
            <span class="font-bold text-xl text-slate-900">Menu</span>
            <button id="mobileClose" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-200 transition-colors">
              <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>

          <nav class="mobile-body flex-1 space-y-2">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
              <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              Home
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
              <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              About
            </a>

            <!-- Mobile Services Accordion -->
            <div class="space-y-2">
              <button id="mobileServicesBtn" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
                <div class="flex items-center gap-3">
                  <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                  </svg>
                  Services
                </div>
                <svg class="w-5 h-5 transition-transform duration-300" id="mobileServicesArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>

              <div id="mobileServicesMenu" class="hidden pl-4 space-y-2 overflow-hidden transition-all duration-300">

                <a href="{{ route('services') }}#aog" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-cyan-50 hover:text-cyan-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-cyan-100 flex items-center justify-center">
                    <svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                  </div>
                  AOG
                </a>

                <a href="{{ route('services') }}#shipChandlers" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M6 7l1 14h10l1-14M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2"></path>
                    </svg>
                  </div>
                  Ship Chandlers
                </a>

                <a href="{{ route('services') }}#projectCargo" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-purple-50 hover:text-purple-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2"></path>
                    </svg>
                  </div>
                  Project Cargo
                </a>

                <a href="{{ route('services') }}#shipSpares" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-blue-50 hover:text-blue-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8 10-4-4-4 4"></path>
                    </svg>
                  </div>
                  Ship-Spares Logistics
                </a>

                <a href="{{ route('services') }}#doorToDeck" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-amber-50 hover:text-amber-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8"></path>
                    </svg>
                  </div>
                  Door to Deck
                </a>

                <a href="{{ route('services') }}#airSeaFreight" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-cyan-50 hover:text-cyan-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-cyan-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M5 8h14M7 16h10"></path>
                    </svg>
                  </div>
                  Air & Sea Freight
                </a>

                <a href="{{ route('services') }}#oilGasProject" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-orange-50 hover:text-orange-600 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l4 8-4 12-4-12 4-8z"></path>
                    </svg>
                  </div>
                  Oil & Gas Project
                </a>

                <a href="{{ route('services') }}#offshoreLogistics" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 hover:text-slate-700 text-sm transition-colors">
                  <div class="w-8 h-8 rounded-lg bg-slate-200 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17l6-6 4 4 8-8"></path>
                    </svg>
                  </div>
                  Offshore Logistics
                </a>

                <div class="pt-2 border-t border-slate-100 mt-2">
                  <a href="{{ route('services') }}" class="flex items-center justify-between px-4 py-2.5 text-cyan-600 font-semibold text-sm">
                    View All Services
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <a href="{{ route('resources') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
              <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
              </svg>
              Resources
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
              <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
              Contact
            </a>

            {{-- Admin Login (Mobile) --}}
            @auth
            @if(auth()->user()->is_admin)
            <a href="{{ route('admin.dashboard') }}"
              class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
              <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 2c-2.761 0-5 2.239-5 5v1h10v-1c0-2.761-2.239-5-5-5z" />
              </svg>
              Admin
            </a>
            @endif
            @else
            <button type="button" id="mobileAdminLoginBtn"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 font-medium transition-colors">
              <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 2c-2.761 0-5 2.239-5 5v1h10v-1c0-2.761-2.239-5-5-5z" />
              </svg>
              Admin Login
            </button>
            @endauth
          </nav>

          <div class="mobile-footer pt-6 border-t border-slate-200">
            <a href="{{ route('contact') }}#quoteForm" class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl bg-slate-900 text-white font-semibold hover:bg-slate-800 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
              </svg>
              Get a Quote
            </a>
          </div>

        </div>
      </div>
    </div>
</header>

{{-- Mega Menu Panel --}}
<div id="accountPanel" class="fixed z-[9999] opacity-0 invisible translate-y-4 scale-95 transition-all duration-500 ease-out"
  style="top: 100px; right: 36px; display:block;">

  <div class="relative w-[92vw] max-w-[420px] bg-slate-900/95 backdrop-blur-2xl rounded-3xl border border-slate-700/50 shadow-[0_50px_100px_-20px_rgba(0,0,0,0.5),0_30px_60px_-30px_rgba(0,0,0,0.3),inset_0_0_0_1px_rgba(255,255,255,0.1)] overflow-hidden">

    {{-- Ambient Glow --}}
    <div class="absolute -top-32 -right-32 w-64 h-64 bg-cyan-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>

    {{-- Grid Pattern Overlay --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none"></div>

    @guest
    {{-- LOGIN SECTION --}}
    <div class="relative p-8">
      {{-- Header --}}
      <div class="mb-6">
        <h3 class="text-2xl font-bold text-white mb-1">Welcome Back</h3>
        <p class="text-slate-400 text-sm">Enter your credentials to access the command center.</p>
      </div>

      <div id="loginError"
        class="hidden mb-4 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
      </div>

      {{-- Login Form --}}
      <form id="adminLoginForm" method="POST" action="{{ route('admin.login.ajax') }}" class="space-y-4">
        @csrf

        <div class="space-y-1">
          <label class="text-xs font-medium text-slate-400 uppercase tracking-wider ml-1">Email Address</label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <i class="bi bi-envelope text-slate-500 group-focus-within:text-cyan-400 transition-colors"></i>
            </div>
            <input type="email" name="email" required
              class="w-full pl-11 pr-4 py-3.5 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500/50 focus:ring-2 focus:ring-cyan-500/20 transition-all"
              placeholder="info@jmsshipping.com">
          </div>
        </div>

        <div class="space-y-1">
          <label class="text-xs font-medium text-slate-400 uppercase tracking-wider ml-1">Password</label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <i class="bi bi-shield-lock text-slate-500 group-focus-within:text-cyan-400 transition-colors"></i>
            </div>
            <input type="password" name="password" required
              class="w-full pl-11 pr-4 py-3.5 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500/50 focus:ring-2 focus:ring-cyan-500/20 transition-all"
              placeholder="••••••••">
          </div>
        </div>

        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2 text-slate-400 hover:text-slate-300 cursor-pointer transition-colors">
            <input type="checkbox" name="remember"
              class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-cyan-500 focus:ring-cyan-500/20">
            <span>Remember session</span>
          </label>
        </div>

        <button type="submit"
          class="group relative w-full py-4 rounded-xl overflow-hidden transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
          <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-500 transition-all duration-300 group-hover:brightness-110"></div>
          <div class="absolute inset-0 bg-[linear-gradient(45deg,transparent_25%,rgba(255,255,255,0.2)_50%,transparent_75%)] bg-[length:250%_250%] animate-[shimmer_3s_infinite]"></div>
          <span class="relative flex items-center justify-center gap-2 text-white font-semibold">
            <span>Initialize Session</span>
            <i class="btnIcon bi bi-arrow-right-circle transition-transform group-hover:translate-x-1"></i>
          </span>
        </button>
      </form>

      {{-- Security Note --}}
      <div class="mt-6 flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/30 border border-slate-700/30">
        <i class="bi bi-shield-check text-emerald-400 text-lg"></i>
        <p class="text-xs text-slate-400">Protected by 256-bit encryption. Unauthorized access is monitored.</p>
      </div>
    </div>
    @endguest

    @auth
    {{-- AUTHENTICATED DASHBOARD --}}
    <div class="relative p-8">
      {{-- User Profile Header --}}
      <div class="flex items-center gap-4 mb-8">
        <div class="relative">
          <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-400 to-purple-600 p-[2px]">
            <div class="w-full h-full rounded-2xl bg-slate-900 flex items-center justify-center">
              <span class="text-2xl font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
            </div>
          </div>
          <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-500 rounded-full border-3 border-slate-900 flex items-center justify-center">
            <i class="bi bi-check text-white text-xs"></i>
          </span>
        </div>
        <div>
          <h3 class="text-lg font-bold text-white">{{ auth()->user()->name }}</h3>
          <p class="text-sm text-slate-400">{{ auth()->user()->email }}</p>
          <span class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-0.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            Active Session
          </span>
        </div>
      </div>

      {{-- Quick Actions Grid --}}
      <div class="grid grid-cols-2 gap-3 mb-6">
        @if(auth()->user()->is_admin)
        <a href="{{ route('admin.dashboard') }}"
          class="group p-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-cyan-500/30 hover:bg-slate-800 transition-all duration-300">
          <div class="w-10 h-10 rounded-xl bg-cyan-500/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <i class="bi bi-grid-3x3-gap text-cyan-400 text-lg"></i>
          </div>
          <p class="text-sm font-semibold text-white">Dashboard</p>
          <p class="text-xs text-slate-500 mt-0.5">Command Center</p>
        </a>

        <a href="{{ route('admin.resources.index') }}"
          class="group p-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-emerald-500/30 hover:bg-slate-800 transition-all duration-300">
          <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <i class="bi bi-journal-richtext text-emerald-400 text-lg"></i>
          </div>
          <p class="text-sm font-semibold text-white">Resources</p>
          <p class="text-xs text-slate-500 mt-0.5">{{ $resourcesCount ?? 0 }} posts</p>
        </a>
        @endif

        <a href="{{ route('admin.inquiries.index') }}"
          class="group p-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-purple-500/30 hover:bg-slate-800 transition-all duration-300">
          <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <i class="bi bi-inbox text-purple-400 text-lg"></i>
          </div>
          <p class="text-sm font-semibold text-white">Inquiries</p>
          <p class="text-xs text-slate-500 mt-0.5">{{ $unreadCount ?? 0 }} pending</p>
        </a>

        <button onclick="document.getElementById('logout-form').submit()"
          class="group p-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-red-500/30 hover:bg-red-500/5 transition-all duration-300 text-left">
          <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <i class="bi bi-power text-red-400 text-lg"></i>
          </div>
          <p class="text-sm font-semibold text-white">Terminate</p>
          <p class="text-xs text-slate-500 mt-0.5">End Session</p>
        </button>
      </div>

      <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
      </form>

      {{-- Session Info --}}
      <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-slate-800/30 border border-slate-700/30">
        <div class="flex items-center gap-2 text-xs text-slate-500">
          <i class="bi bi-clock-history"></i>
          <span>Session started {{ auth()->user()->created_at->diffForHumans() }}</span>
        </div>
        <div class="flex items-center gap-1">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
          <span class="text-xs text-emerald-400 font-medium">Secure</span>
        </div>
      </div>
    </div>
    @endauth
  </div>
</div>

@if(trim($__env->yieldContent('hideHeaderSpacer')) !== '1')
<div class="h-20 sm:h-24"></div>
@endif