<header id="siteHeader"
  class="fixed top-0 left-0 right-0 z-50 transition-transform duration-300 translate-y-0">
  <div class="max-w-7xl mx-auto px-4">
    {{-- premium glass wrapper --}}
    <div id="headerBar"
      class="relative mt-4 rounded-2xl border border-slate-200/60 bg-white/80 backdrop-blur-xl
         shadow-[0_10px_30px_rgba(2,6,23,0.10)] transition-all duration-300">

      <div class="h-20 flex items-center justify-between px-4 md:px-6">
        <a href="{{ url('/') }}" class="flex items-center gap-3 font-bold text-lg">
          <img src="{{ asset('images/logo.png') }}" alt="JMS Logo" class="logo h-12 w-auto">
          <span id="brandText" class="font-bold text-xl text-slate-900">JMS Shipping</span>
        </a>

        <button id="navBtn" class="md:hidden p-2 rounded-lg hover:bg-black/5" aria-label="Menu">
          <i id="navIcon" class="bi bi-list text-2xl"></i>
        </button>

        <nav id="headerNav" class="hidden md:flex items-center gap-2 text-sm font-medium">
          {{-- link style: pill + underline --}}
          <a class="jms-navlink" href="{{ route('home') }}">Home</a>
          <a class="jms-navlink" href="{{ route('about') }}">About</a>

          {{-- SERVICES MEGA MENU (desktop) --}}
          <div id="svcRoot" class="relative">
            <button id="svcBtn"
              type="button"
              class="jms-navlink-btn inline-flex items-center gap-1"
              aria-expanded="false"
              aria-controls="svcPanel">
              Services
            </button>

            {{-- Overlay (click outside closes) --}}
            <div id="svcOverlay" class="hidden fixed inset-0 z-40 bg-black/30"></div>

            {{-- Mega Panel --}}
            <div id="svcPanel" class="svc-panel z-50" data-state="compact">
              <div class="svc-inner">
                {{-- LEFT: categories --}}
                <aside class="svc-left">
                  <button class="svc-item is-active" type="button" data-pane="air">
                    Air Freight
                  </button>
                  <button class="svc-item" type="button" data-pane="sea">
                    Sea Freight
                  </button>
                  <button class="svc-item" type="button" data-pane="land">
                    Land Transport
                  </button>
                  <button class="svc-item" type="button" data-pane="customs">
                    Customs Clearance
                  </button>
                  <button class="svc-item" type="button" data-pane="project">
                    Project Cargo
                  </button>

                  <div class="svc-divider"></div>

                  <a class="svc-link" href="{{ route('services') }}">All Services</a>
                  <a class="svc-link" href="{{ route('contact') }}">Talk to an Expert</a>
                </aside>

                {{-- RIGHT: panes --}}
                <section class="svc-right">
                  {{-- AIR --}}
                  <div class="svc-pane is-active" data-pane="air">
                    <div class="svc-head">
                      <h3>Air Freight</h3>
                      <p>Fast worldwide delivery with priority options and tracking support.</p>
                    </div>

                    <div class="svc-cols">
                      <div>
                        <div class="svc-coltitle">Best for</div>
                        <ul class="svc-list">
                          <li>Urgent shipments</li>
                          <li>High-value cargo</li>
                          <li>Time-critical deliveries</li>
                        </ul>
                      </div>
                      <div>
                        <div class="svc-coltitle">We handle</div>
                        <ul class="svc-list">
                          <li>Pickup → airport → delivery</li>
                          <li>Documentation & compliance</li>
                          <li>Consolidation options</li>
                        </ul>
                      </div>
                    </div>

                    <div class="svc-actions">
                      <a class="svc-cta" href="{{ route('quote') }}">Get a Quote</a>
                      <a class="svc-ghost" href="{{ route('contact') }}">Contact</a>
                    </div>
                  </div>

                  {{-- SEA --}}
                  <div class="svc-pane" data-pane="sea">
                    <div class="svc-head">
                      <h3>Sea Freight</h3>
                      <p>Cost-efficient shipping for FCL / LCL with reliable scheduling.</p>
                    </div>

                    <div class="svc-cols">
                      <div>
                        <div class="svc-coltitle">Options</div>
                        <ul class="svc-list">
                          <li>FCL / LCL</li>
                          <li>Port-to-port / Door-to-door</li>
                          <li>Weekly sailing coordination</li>
                        </ul>
                      </div>
                      <div>
                        <div class="svc-coltitle">Support</div>
                        <ul class="svc-list">
                          <li>Documentation & packing list</li>
                          <li>Customs coordination</li>
                          <li>Tracking & status updates</li>
                        </ul>
                      </div>
                    </div>

                    <div class="svc-actions">
                      <a class="svc-cta" href="{{ route('quote') }}">Get a Quote</a>
                      <a class="svc-ghost" href="{{ route('services') }}">Learn More</a>
                    </div>
                  </div>

                  {{-- LAND --}}
                  <div class="svc-pane" data-pane="land">
                    <div class="svc-head">
                      <h3>Land Transport</h3>
                      <p>Regional trucking solutions with safe handling and fast dispatch.</p>
                    </div>

                    <div class="svc-cols">
                      <div>
                        <div class="svc-coltitle">Services</div>
                        <ul class="svc-list">
                          <li>Local & GCC transport</li>
                          <li>FTL / LTL</li>
                          <li>Warehouse pickup & delivery</li>
                        </ul>
                      </div>
                      <div>
                        <div class="svc-coltitle">Cargo types</div>
                        <ul class="svc-list">
                          <li>General cargo</li>
                          <li>Fragile handling</li>
                          <li>Time-slot deliveries</li>
                        </ul>
                      </div>
                    </div>

                    <div class="svc-actions">
                      <a class="svc-cta" href="{{ route('quote') }}">Get a Quote</a>
                      <a class="svc-ghost" href="{{ route('contact') }}">Contact</a>
                    </div>
                  </div>

                  {{-- CUSTOMS --}}
                  <div class="svc-pane" data-pane="customs">
                    <div class="svc-head">
                      <h3>Customs Clearance</h3>
                      <p>Fast clearance, compliant documentation, and smooth processing.</p>
                    </div>

                    <div class="svc-cols">
                      <div>
                        <div class="svc-coltitle">We manage</div>
                        <ul class="svc-list">
                          <li>Import / Export paperwork</li>
                          <li>HS code guidance</li>
                          <li>Duty & VAT coordination</li>
                        </ul>
                      </div>
                      <div>
                        <div class="svc-coltitle">For</div>
                        <ul class="svc-list">
                          <li>Air / Sea / Land shipments</li>
                          <li>Commercial & personal cargo</li>
                          <li>Time-sensitive clearance</li>
                        </ul>
                      </div>
                    </div>

                    <div class="svc-actions">
                      <a class="svc-cta" href="{{ route('contact') }}">Talk to an Expert</a>
                      <a class="svc-ghost" href="{{ route('quote') }}">Get a Quote</a>
                    </div>
                  </div>

                  {{-- PROJECT --}}
                  <div class="svc-pane" data-pane="project">
                    <div class="svc-head">
                      <h3>Project Cargo</h3>
                      <p>Oversized cargo planning, special handling, and full coordination.</p>
                    </div>

                    <div class="svc-cols">
                      <div>
                        <div class="svc-coltitle">Includes</div>
                        <ul class="svc-list">
                          <li>Route & permits planning</li>
                          <li>Special equipment support</li>
                          <li>On-site coordination</li>
                        </ul>
                      </div>
                      <div>
                        <div class="svc-coltitle">Ideal for</div>
                        <ul class="svc-list">
                          <li>Heavy machinery</li>
                          <li>Construction projects</li>
                          <li>Industrial shipments</li>
                        </ul>
                      </div>
                    </div>

                    <div class="svc-actions">
                      <a class="svc-cta" href="{{ route('contact') }}">Request a Call</a>
                      <a class="svc-ghost" href="{{ route('services') }}">Our Services</a>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>

          <a class="jms-navlink" href="{{ route('blog') }}">Resources</a>
          <a class="jms-navlink" href="{{ route('contact') }}">Contact</a>

          <a id="headerCta" href="{{ route('quote') }}"
            class="ml-2 inline-flex items-center gap-2 rounded-xl bg-white text-slate-900 px-4 py-2 font-semibold
                   shadow hover:bg-white/90 transition">
            <i class="bi bi-chat-left-text"></i>
            Get a Quote
          </a>
        </nav>
      </div>
    </div>
  </div>

  {{-- Mobile menu --}}
  <div id="mobileNav"
    class="md:hidden hidden mt-3 rounded-2xl border border-slate-200/60 bg-white/90 backdrop-blur-xl shadow-lg p-4">
    <div class="flex flex-col gap-2 text-sm font-medium">
      <a class="jms-mnav" href="{{ route('home') }}">Home</a>
      <a class="jms-mnav" href="{{ route('about') }}">About</a>
      <a class="jms-mnav" href="{{ route('services') }}">Services</a>
      <a class="jms-mnav" href="{{ route('blog') }}">Resources</a>
      <a class="jms-mnav" href="{{ route('contact') }}">Contact</a>

      <a href="{{ route('quote') }}"
        class="mt-2 inline-flex justify-center items-center gap-2 rounded-xl bg-white text-slate-900 px-4 py-3 font-semibold">
        <i class="bi bi-chat-left-text"></i>
        Get a Quote
      </a>
    </div>
  </div>
</header>

@if(trim($__env->yieldContent('hideHeaderSpacer')) !== '1')
<div class="h-24 sm:h-28"></div>
@endif