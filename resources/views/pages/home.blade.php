@extends('layouts.app')
@section('title','JMS | Home')

{{-- Home needs hero behind header --}}
@section('mainClass','pt-0')
@section('hideHeaderSpacer','1')

@section('content')
<section id="jmsHero" class="relative h-[100svh]">
  {{-- Slides --}}
  <div class="absolute inset-0 overflow-hidden">
    {{-- Slide 1: VIDEO --}}
    <div class="jms-slide is-active" data-type="video"
      data-title="Fast & Reliable Logistics for Air, Sea, Land & Customs"
      data-desc="End-to-end shipping with transparent communication and real-time support."
      data-btn1-label="Explore Resources"
      data-btn1-href="{{ route('resources') }}"
      data-btn2-label="View Services"
      data-btn2-href="{{ route('services') }}">
      <video class="jms-media" muted playsinline preload="auto">
        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
      </video>
    </div>

    {{-- Slide 2: VIDEO --}}
    <div class="jms-slide" data-type="video"
      data-title="Customs Clearance & Documentation"
      data-desc="Fast clearance, compliant paperwork, and smooth border processing for your cargo."
      data-btn1-label="Get a Quote"
      data-btn1-href="{{ route('contact') }}#quoteForm"
      data-btn2-label="Contact Us"
      data-btn2-href="{{ route('contact') }}">
      <video class="jms-media" muted playsinline preload="auto">
        <source src="{{ asset('videos/hero4.mp4') }}" type="video/mp4">
      </video>
    </div>

    {{-- Slide 3: VIDEO --}}
    <div class="jms-slide" data-type="video"
      data-title="Project Cargo & Heavy Shipments"
      data-desc="Special handling, route planning, and end-to-end coordination for oversized cargo."
      data-btn1-label="Request a Call"
      data-btn1-href="{{ route('contact') }}"
      data-btn2-label="Our Services"
      data-btn2-href="{{ route('services') }}">
      <video class="jms-media" muted playsinline preload="auto">
        <source src="{{ asset('videos/hero5.mp4') }}" type="video/mp4">
      </video>
    </div>
  </div>

  {{-- Overlay (readability) --}}
  <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/35 to-black/15"></div>

  {{-- Right-center social icons --}}
  <div class="hidden md:flex flex-col gap-3 absolute right-6 top-1/2 -translate-y-1/2 z-30">
    <a href="#" target="_blank" aria-label="X" class="jms-social"><i class="bi bi-linkedin"></i></a>
    
    <a href="#" target="_blank" aria-label="X" class="jms-social"><i class="bi bi-twitter-x"></i></a>
    
    <a href="#" target="_blank" aria-label="Instagram" class="jms-social"><i class="bi bi-instagram"></i></a>
    
    <a href="#" target="_blank" aria-label="Facebook" class="jms-social"><i class="bi bi-facebook"></i></a>
  </div>

  {{-- Content --}}
  <div class="relative z-10 max-w-7xl mx-auto px-4 h-full">
    <div class="h-full flex items-center">
      <div id="heroCopy" class="max-w-xl pt-24 md:pt-28">
        <h1 id="heroTitle" class="text-white text-4xl md:text-5xl font-extrabold leading-tight">
          Fast & Reliable Logistics for Air, Sea, Land & Customs
        </h1>

        <p id="heroDesc" class="mt-4 text-white/85 text-base md:text-lg">
          We move your cargo smoothly with end-to-end support and transparent communication.
        </p>

        <div class="mt-6 flex gap-3 flex-wrap">
          <a id="heroBtn1" href="{{ route('contact') }}#quoteForm"
            class="rounded-lg bg-white text-slate-900 px-5 py-3 font-semibold hover:bg-white/90">
            Track Your Order
          </a>

          <a id="heroBtn2" href="{{ route('services') }}"
            class="rounded-lg border border-white/40 text-white px-5 py-3 hover:bg-white/10">
            View Services
          </a>
        </div>
      </div>
    </div>

  </div>

  {{-- Dots --}}
  <div class="jms-dots absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-2">
    <button class="jms-dot is-active" data-index="0" aria-label="Slide 1"></button>
    <button class="jms-dot" data-index="1" aria-label="Slide 2"></button>
    <button class="jms-dot" data-index="2" aria-label="Slide 3"></button>
  </div>
</section>

{{-- ===== SERVICES (REDESIGNED WITH ANIMATED GRADIENT & ANIMATIONS) ===== --}}
<section id="homeServices" class="relative bg-white">

  {{-- Animated Gradient Background (replaces image) --}}
  <div class="absolute inset-0 z-0">
    {{-- Base dark gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-white via-slate-50 to-white"></div>

    {{-- Animated gradient orbs --}}
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-cyan-500/20 rounded-full blur-[120px] animate-float-slow"></div>
      <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[100px] animate-float-slow" style="animation-delay: -5s;"></div>
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-indigo-500/10 rounded-full blur-[150px] animate-pulse-slow"></div>
    </div>

    {{-- Subtle grid pattern overlay --}}
    <div class="absolute inset-0 opacity-[0.06]" style="background-image: radial-gradient(circle at 1px 1px, rgb(15 23 42) 1px, transparent 0); background-size: 40px 40px;"></div>

    {{-- Vignette --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_0%,rgba(2,6,23,0.08)_100%)]"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 py-24">
    {{-- Header with reveal animation --}}
    <div class="text-center mb-16" data-aos="fade-up">
      <!-- <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm text-cyan-400 text-sm font-semibold mb-6 border border-white/10">
        <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span>
        What We Offer
      </span> -->
      <h2 class="text-5xl md:text-6xl font-extrabold text-slate-900 mb-6 leading-tight">
        Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 animate-gradient">Services</span>
      </h2>
      <p class="mt-5 text-slate-600 max-w-2xl mx-auto text-lg">
        Complete logistics solutions planned, coordinated, and delivered with precision and care.
      </p>
    </div>

    {{-- Cards Grid with stagger animations --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 perspective-1000">
      {{-- Air --}}
      <a href="{{ route('services') }}" class="service-card group relative" data-aos="fade-up" data-aos-delay="0">
        <div class="service-card-inner">
          <div class="service-icon-wrapper">
            <div class="service-icon bg-gradient-to-br from-cyan-400/20 to-blue-500/20 text-cyan-400 group-hover:text-white">
              <span class="icon-normal"><i class="bi bi-airplane-fill text-2xl"></i></span>
              <span class="icon-hover"><i class="bi bi-arrow-up-right text-2xl"></i></span>
            </div>
            <div class="service-glow group-hover:opacity-100"></div>
          </div>
          <h3 class="service-title">Air Freight</h3>
          <p class="service-desc">Fast delivery for urgent and high-value shipments worldwide with real-time tracking.</p>
          <div class="service-arrow">
            <span>Learn More</span>
            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </div>
        </div>
      </a>

      {{-- Sea --}}
      <a href="{{ route('services') }}" class="service-card group relative" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card-inner">
          <div class="service-icon-wrapper">
            <div class="service-icon bg-gradient-to-br from-blue-400/20 to-indigo-500/20 text-blue-400 group-hover:text-white">
              <span class="icon-normal"><i class="bi bi-water text-2xl"></i></span>
              <span class="icon-hover"><i class="bi bi-arrow-up-right text-2xl"></i></span>
            </div>
            <div class="service-glow group-hover:opacity-100"></div>
          </div>
          <h3 class="service-title">Sea Freight</h3>
          <p class="service-desc">Cost-efficient FCL/LCL solutions with reliable sailing schedules and global coverage.</p>
          <div class="service-arrow">
            <span>Learn More</span>
            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </div>
        </div>
      </a>

      {{-- Land --}}
      <a href="{{ route('services') }}" class="service-card group relative" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card-inner">
          <div class="service-icon-wrapper">
            <div class="service-icon bg-gradient-to-br from-emerald-400/20 to-teal-500/20 text-emerald-400 group-hover:text-white">
              <span class="icon-normal"><i class="bi bi-truck text-2xl"></i></span>
              <span class="icon-hover"><i class="bi bi-arrow-up-right text-2xl"></i></span>
            </div>
            <div class="service-glow group-hover:opacity-100"></div>
          </div>
          <h3 class="service-title">Land Transport</h3>
          <p class="service-desc">Regional trucking and door delivery with careful handling and GPS tracking.</p>
          <div class="service-arrow">
            <span>Learn More</span>
            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </div>
        </div>
      </a>

      {{-- Customs --}}
      <a href="{{ route('services') }}" class="service-card group relative" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card-inner">
          <div class="service-icon-wrapper">
            <div class="service-icon bg-gradient-to-br from-amber-400/20 to-orange-500/20 text-amber-400 group-hover:text-white">
              <span class="icon-normal"><i class="bi bi-file-earmark-text-fill text-2xl"></i></span>
              <span class="icon-hover"><i class="bi bi-arrow-up-right text-2xl"></i></span>
            </div>
            <div class="service-glow group-hover:opacity-100"></div>
          </div>
          <h3 class="service-title">Customs Clearance</h3>
          <p class="service-desc">Compliance, documentation, HS code support, and fast clearance processing.</p>
          <div class="service-arrow">
            <span>Learn More</span>
            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </div>
        </div>
      </a>

      {{-- Project --}}
      <a href="{{ route('services') }}" class="service-card group relative" data-aos="fade-up" data-aos-delay="400">
        <div class="service-card-inner">
          <div class="service-icon-wrapper">
            <div class="service-icon bg-gradient-to-br from-rose-400/20 to-pink-500/20 text-rose-400 group-hover:text-white">
              <span class="icon-normal"><i class="bi bi-box-seam-fill text-2xl"></i></span>
              <span class="icon-hover"><i class="bi bi-arrow-up-right text-2xl"></i></span>
            </div>
            <div class="service-glow group-hover:opacity-100"></div>
          </div>
          <h3 class="service-title">Project Cargo</h3>
          <p class="service-desc">Oversized shipments planned end-to-end with special coordination and permits.</p>
          <div class="service-arrow">
            <span>Learn More</span>
            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </div>
        </div>
      </a>

      {{-- Door-to-Door --}}
      <a href="{{ route('services') }}" class="service-card group relative" data-aos="fade-up" data-aos-delay="500">
        <div class="service-card-inner">
          <div class="service-icon-wrapper">
            <div class="service-icon bg-gradient-to-br from-violet-400/20 to-purple-500/20 text-violet-400 group-hover:text-white">
              <span class="icon-normal"><i class="bi bi-globe-americas text-2xl"></i></span>
              <span class="icon-hover"><i class="bi bi-arrow-up-right text-2xl"></i></span>
            </div>
            <div class="service-glow group-hover:opacity-100"></div>
          </div>
          <h3 class="service-title">Door-to-Door</h3>
          <p class="service-desc">Pickup, freight, clearance, and delivery — handled end-to-end seamlessly.</p>
          <div class="service-arrow">
            <span>Learn More</span>
            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </div>
        </div>
      </a>
    </div>

    {{-- Bottom CTA with glass effect --}}
    <div class="mt-20 relative" data-aos="fade-up" data-aos-delay="600">
      <div class="glass-card p-8 md:p-10 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl relative overflow-hidden group">
        {{-- Subtle shine effect --}}
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
          <div class="text-center md:text-left">
            <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Need help choosing the right service?</h3>
            <p class="text-slate-600">Tell us your origin, destination, and cargo details — we'll guide you.</p>
          </div>
          <div class="flex gap-4 flex-wrap justify-center">
            <a href="{{ route('contact') }}" class="px-8 py-4 bg-cyan-500 hover:bg-cyan-400 text-white rounded-full font-bold transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/30 hover:-translate-y-1 flex items-center gap-2">
              <i class="bi bi-chat-dots"></i> Contact Us
            </a>
            <a href="{{ route('contact') }}#quoteForm" class="px-8 py-4 border-2 border-slate-200 text-slate-800 hover:bg-slate-900 hover:text-white rounded-full font-bold transition-all duration-300 hover:-translate-y-1 flex items-center gap-2">
              <i class="bi bi-calculator"></i> Get a Quote
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- WHY choose us (Sticky 3-panel story) --}}
<section id="whyJmsStory" class="jms-why-story">
  <div class="jms-why-stickyRow">
    <div class="jms-why-heading">
      <h2 class="jms-why-h2">Why Choose Us</h2>
      <p class="jms-why-sub">Trusted logistics, clear communication, and reliable execution.</p>
    </div>

    <article class="jms-why-col" data-bg="{{ asset('images/why-1.png') }}">
      <div class="jms-why-overlay"></div>
      <div class="jms-why-copy" data-speed="0.70">
        <div class="jms-why-num">1</div>
        <div class="jms-why-title">Reliability</div>
        <div class="jms-why-desc">End-to-end coordination with updates you can trust — no surprises.</div>
      </div>
    </article>

    <article class="jms-why-col" data-bg="{{ asset('images/why-2.png') }}">
      <div class="jms-why-overlay"></div>
      <div class="jms-why-copy" data-speed="0.50">
        <div class="jms-why-num">2</div>
        <div class="jms-why-title">Innovation</div>
        <div class="jms-why-desc">Smart planning, smooth coordination, and proactive shipment support.</div>
      </div>
    </article>

    <article class="jms-why-col" data-bg="{{ asset('images/why-3.jpg') }}">
      <div class="jms-why-overlay"></div>
      <div class="jms-why-copy" data-speed="0.60">
        <div class="jms-why-num">3</div>
        <div class="jms-why-title">Compliance</div>
        <div class="jms-why-desc">Accurate documentation, HS code guidance, and smooth clearance handling.</div>
      </div>
    </article>
  </div>
</section>

{{-- ===== STATS MOSAIC (WITH PARALLAX & SCROLL ANIMATIONS) ===== --}}
<section id="jmsStats" class="bg-white relative">
  {{-- Decorative background elements --}}
  <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-cyan-50/50 to-transparent pointer-events-none"></div>
  <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100/30 rounded-full blur-3xl pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-4 py-24 relative z-10">
    <div class="flex items-end justify-between gap-6 flex-wrap mb-16" data-aos="fade-up">
      <div>
        <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Our Track Record</span>
        <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mt-2">Our Impact</h2>
        <p class="mt-3 text-slate-600 max-w-2xl text-lg">Trusted logistics performance backed by real results and satisfied clients.</p>
      </div>
    </div>

    <div class="jms-mosaic-parallax">
      {{-- Big stat card (yellow) with parallax --}}
      <div class="stat-card-parallax jms-m1 group" data-speed="0.8" data-aos="zoom-in" data-aos-delay="0">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-300/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-22px"></div>
        <div class="jms-m1-top text-sm font-semibold text-slate-800/80 flex items-center gap-2">
          <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
          Moves completed
        </div>

        <div class="mt-8">
          <div class="jms-stat-big text-6xl md:text-7xl font-bold text-slate-900 tracking-tight">
            <span class="jms-count counter-anim" data-to="1500" data-suffix="+">0</span>
          </div>
        </div>

        <p class="mt-4 max-w-sm text-slate-700 leading-relaxed">
          Whether it's a local shipment or a complex cargo move, we've successfully coordinated thousands across the globe.
        </p>

        <img src="{{ asset('images/truck.png') }}" alt="Truck" class="jms-m1-img transform group-hover:scale-110 group-hover:rotate-2 transition-transform duration-700 ease-out">

        {{-- Floating badge --}}
        <div class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-slate-700 shadow-lg transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
          Growing Daily
        </div>
      </div>

      {{-- Top-right media with parallax zoom --}}
      <div class="stat-card-parallax jms-m2 overflow-hidden group" data-speed="1.2" data-aos="zoom-in" data-aos-delay="100">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <video class="jms-m2-media transform group-hover:scale-110 transition-transform duration-700 ease-out" autoplay muted loop playsinline preload="metadata">
          <source src="{{ asset('videos/stats.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute bottom-4 left-4 z-20 text-white transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
          <p class="text-sm font-semibold">Live Operations</p>
        </div>
      </div>

      {{-- Bottom-left image with parallax --}}
      <div class="stat-card-parallax jms-m3 overflow-hidden group" data-speed="0.9" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('images/box.jpg') }}" alt="Cargo" class="jms-m3-media transform group-hover:scale-110 transition-transform duration-700 ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="absolute bottom-4 left-4 text-white transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
          <p class="text-lg font-bold">Secure Handling</p>
        </div>
      </div>

      {{-- Bottom-middle years with counter animation --}}
      <div class="stat-card-parallax jms-m4 group hover:shadow-2xl transition-all duration-500" data-speed="1.1" data-aos="zoom-in" data-aos-delay="300">
        <div class="text-sm font-semibold text-slate-600 flex items-center gap-2 mb-4">
          <i class="bi bi-calendar-check text-cyan-600"></i>
          Industry experience
        </div>

        <div class="mt-6">
          <div class="jms-stat-mid text-5xl font-bold text-slate-900">
            <span class="jms-count counter-anim" data-to="10" data-suffix="+">0</span>
            <span class="text-2xl text-slate-500 font-normal">Years</span>
          </div>
        </div>

        <p class="mt-4 text-slate-600 leading-relaxed">
          A decade of experience means you're in safe, experienced hands with industry experts.
        </p>

        <div class="mt-6 flex gap-2">
          <div class="h-1.5 w-12 bg-cyan-500 rounded-full"></div>
          <div class="h-1.5 w-6 bg-cyan-300 rounded-full"></div>
          <div class="h-1.5 w-4 bg-cyan-200 rounded-full"></div>
        </div>
      </div>

      {{-- Bottom-right satisfaction with animated avatars --}}
      <div class="stat-card-parallax jms-m5 group relative overflow-hidden" data-speed="0.7" data-aos="zoom-in" data-aos-delay="400">
        {{-- Animated background gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-900 to-black"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/10 via-transparent to-blue-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <div class="relative z-10">
          <div class="text-sm font-semibold text-slate-400 flex items-center gap-2 mb-4">
            <i class="bi bi-heart-fill text-red-500 animate-pulse"></i>
            Customer satisfaction
          </div>

          <div class="mt-6">
            <div class="jms-stat-dark text-6xl font-bold text-white">
              <span class="jms-count counter-anim" data-to="98" data-suffix="%">0</span>
            </div>
          </div>

          <p class="mt-4 text-slate-300 leading-relaxed max-w-sm">
            Our clients love us for reliability, speed, and stress-free service delivery every time.
          </p>

          <div class="mt-8 jms-ava-row flex items-center">
            <img class="jms-ava w-10 h-10 border-2 border-slate-700 transform hover:scale-110 hover:-translate-y-1 transition-transform duration-300" src="{{ asset('images/ava1.avif') }}" alt="">
            <img class="jms-ava w-10 h-10 border-2 border-slate-700 transform hover:scale-110 hover:-translate-y-1 transition-transform duration-300" style="transition-delay: 50ms;" src="{{ asset('images/ava2.avif') }}" alt="">
            <img class="jms-ava w-10 h-10 border-2 border-slate-700 transform hover:scale-110 hover:-translate-y-1 transition-transform duration-300" style="transition-delay: 100ms;" src="{{ asset('images/ava3.avif') }}" alt="">
            <img class="jms-ava w-10 h-10 border-2 border-slate-700 transform hover:scale-110 hover:-translate-y-1 transition-transform duration-300" style="transition-delay: 150ms;" src="{{ asset('images/ava4.avif') }}" alt="">
            <div class="jms-heart w-10 h-10 bg-cyan-500/20 border border-cyan-400/30 flex items-center justify-center transform hover:scale-110 hover:rotate-12 transition-all duration-300">
              <i class="bi bi-heart-fill text-cyan-400 text-sm"></i>
            </div>
            <span class="ml-3 text-sm text-slate-400 font-medium">+2.5k happy clients</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ===== FAQ (MODERN REDESIGN) ===== --}}
<section id="faq" class="bg-slate-50 relative overflow-hidden">
  {{-- Background decorations --}}
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
    <div class="absolute top-20 right-20 w-64 h-64 bg-cyan-200/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 py-24 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-start">
      {{-- Left: Sticky info --}}
      <div class="lg:sticky lg:top-32" data-aos="fade-right">
        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-100 text-cyan-700 text-sm font-semibold mb-6">
          <i class="bi bi-question-circle"></i>
          Support Center
        </span>
        <h2 class="text-5xl md:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
          Your questions,<br>
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600">answered</span>
        </h2>

        <p class="text-slate-600 text-lg leading-relaxed mb-8 max-w-md">
          Find answers to the most common questions about shipping, customs, and documentation. Can't find what you need?
        </p>

        <div class="flex flex-col gap-4">
          <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-slate-900 text-white rounded-full font-bold hover:bg-cyan-600 transition-all duration-300 hover:shadow-lg hover:shadow-cyan-600/30 group w-fit">
            <i class="bi bi-chat-dots text-xl"></i>
            Contact Support
            <i class="bi bi-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
          </a>

          <div class="flex items-center gap-4 text-sm text-slate-500">
            <span class="flex items-center gap-2">
              <i class="bi bi-clock text-cyan-600"></i>
              Avg. response: 2h
            </span>
            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
            <span class="flex items-center gap-2">
              <i class="bi bi-check-circle text-green-500"></i>
              24/7 Available
            </span>
          </div>
        </div>

        {{-- Quick contact cards --}}
        <div class="mt-10 grid grid-cols-2 gap-4">
          <div class="p-4 bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
            <i class="bi bi-envelope text-cyan-600 text-2xl mb-2"></i>
            <p class="font-semibold text-slate-900 text-sm">Email Us</p>
            <p class="text-slate-500 text-xs mt-1">info@jmsshipping.com</p>
          </div>
          <div class="p-4 bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
            <i class="bi bi-telephone text-cyan-600 text-2xl mb-2"></i>
            <p class="font-semibold text-slate-900 text-sm">Call Us</p>
            <p class="text-slate-500 text-xs mt-1">+971 4 5784156</p>
          </div>
        </div>
      </div>

      {{-- Right: FAQ Accordion --}}
      <div class="space-y-4" id="faqList" data-aos="fade-left">

        <div class="faq-modern-item active" data-aos="fade-up" data-aos-delay="0">
          <button class="faq-modern-header" type="button">
            <div class="flex items-center gap-4">
              <div class="faq-icon-wrapper">
                <i class="bi bi-file-text"></i>
              </div>
              <span class="font-bold text-slate-900">Do you handle customs clearance and documentation?</span>
            </div>
            <div class="faq-toggle">
              <i class="bi bi-plus-lg"></i>
            </div>
          </button>
          <div class="faq-modern-body">
            <div class="faq-content">
              Yes — we support import/export clearance, required documentation, and guidance on HS codes and compliance. Our team handles all paperwork to ensure smooth border crossings.
            </div>
          </div>
        </div>

        <div class="faq-modern-item" data-aos="fade-up" data-aos-delay="50">
          <button class="faq-modern-header" type="button">
            <div class="flex items-center gap-4">
              <div class="faq-icon-wrapper">
                <i class="bi bi-globe"></i>
              </div>
              <span class="font-bold text-slate-900">Can you ship by Air, Sea, and Land?</span>
            </div>
            <div class="faq-toggle">
              <i class="bi bi-plus-lg"></i>
            </div>
          </button>
          <div class="faq-modern-body">
            <div class="faq-content">
              Yes. We offer air freight for urgent cargo, sea freight (FCL/LCL) for cost efficiency, and land transport for regional delivery. Multimodal solutions available.
            </div>
          </div>
        </div>

        <div class="faq-modern-item" data-aos="fade-up" data-aos-delay="100">
          <button class="faq-modern-header" type="button">
            <div class="flex items-center gap-4">
              <div class="faq-icon-wrapper">
                <i class="bi bi-calculator"></i>
              </div>
              <span class="font-bold text-slate-900">How do I request a quotation?</span>
            </div>
            <div class="faq-toggle">
              <i class="bi bi-plus-lg"></i>
            </div>
          </button>
          <div class="faq-modern-body">
            <div class="faq-content">
              Share origin, destination, cargo type, weight/volume, and timeline. We'll respond quickly with the best route and pricing options tailored to your needs.
            </div>
          </div>
        </div>

        <div class="faq-modern-item" data-aos="fade-up" data-aos-delay="150">
          <button class="faq-modern-header" type="button">
            <div class="flex items-center gap-4">
              <div class="faq-icon-wrapper">
                <i class="bi bi-door-open"></i>
              </div>
              <span class="font-bold text-slate-900">Do you provide door-to-door delivery?</span>
            </div>
            <div class="faq-toggle">
              <i class="bi bi-plus-lg"></i>
            </div>
          </button>
          <div class="faq-modern-body">
            <div class="faq-content">
              Yes — we can arrange pickup, freight, customs clearance, and final delivery depending on your route and cargo requirements. Full end-to-end service.
            </div>
          </div>
        </div>

        <div class="faq-modern-item" data-aos="fade-up" data-aos-delay="200">
          <button class="faq-modern-header" type="button">
            <div class="flex items-center gap-4">
              <div class="faq-icon-wrapper">
                <i class="bi bi-map"></i>
              </div>
              <span class="font-bold text-slate-900">How do you track shipments and provide updates?</span>
            </div>
            <div class="faq-toggle">
              <i class="bi bi-plus-lg"></i>
            </div>
          </button>
          <div class="faq-modern-body">
            <div class="faq-content">
              We provide proactive status updates and tracking details where available. For special shipments, our team shares milestone updates from pickup to delivery via email or WhatsApp.
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Blog Section for Homepage -->
<section class="py-20 bg-slate-50 relative overflow-hidden">
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #0f172a 1px, transparent 0); background-size: 32px 32px;"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
      <div data-aos="fade-right">
        <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm flex items-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
          </svg>
          Latest Insights
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3">From Our Blog</h2>
      </div>
      <a href="{{ route('resources') }}" class="inline-flex items-center gap-2 text-cyan-600 font-semibold hover:text-cyan-700 transition-colors group" data-aos="fade-left">
        View All Articles
        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
      </a>
    </div>

    <!-- Featured + 2 Side Articles Layout -->
    <div class="grid lg:grid-cols-2 gap-8 items-start">

      <!-- Featured Article (Large) -->
      <article class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500"
        data-aos="fade-right">
        <a href="{{ route('resources') }}" class="block">
          <div class="relative h-64 lg:h-80 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=1200&q=80"
              alt="Featured"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

            <div class="absolute top-4 left-4">
              <span class="px-3 py-1 bg-cyan-500 text-white text-xs font-bold uppercase tracking-wider rounded-full">
                Featured
              </span>
            </div>

            <div class="absolute bottom-0 left-0 right-0 p-6">
              <div class="flex items-center gap-3 text-white/80 text-sm mb-3">
                <span>Jan 15, 2026</span>
                <span class="w-1 h-1 bg-white/50 rounded-full"></span>
                <span>8 min read</span>
              </div>
              <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors line-clamp-2">
                The Future of Sustainable Shipping: 2026 and Beyond
              </h3>
              <p class="text-white/80 text-sm line-clamp-2 mb-4">
                Explore how the maritime industry is embracing green technologies and carbon-neutral logistics solutions.
              </p>
              <span class="inline-flex items-center gap-2 text-cyan-300 font-semibold text-sm">
                Read Article
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </span>
            </div>
          </div>
        </a>
      </article>

      <!-- Side Articles (Stacked) -->
      <div class="flex flex-col gap-6">

        <!-- Article 2 -->
        <article class="group flex gap-5 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-4" data-aos="fade-left" data-aos-delay="100">
          <div class="relative w-32 h-32 flex-shrink-0 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=400&q=80"
              alt="Article"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
          </div>
          <div class="flex flex-col justify-center">
            <span class="text-cyan-600 text-xs font-bold uppercase tracking-wider mb-2">Shipping Guide</span>
            <h4 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors line-clamp-2">
              Complete Guide to Incoterms 2026
            </h4>
            <div class="flex items-center gap-2 text-slate-500 text-sm">
              <span>Jan 12, 2026</span>
              <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
              <span>5 min</span>
            </div>
          </div>
        </article>

        <!-- Article 3 -->
        <article class="group flex gap-5 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-4" data-aos="fade-left" data-aos-delay="200">
          <div class="relative w-32 h-32 flex-shrink-0 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?w=400&q=80"
              alt="Article"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
          </div>
          <div class="flex flex-col justify-center">
            <span class="text-amber-600 text-xs font-bold uppercase tracking-wider mb-2">Regulations</span>
            <h4 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors line-clamp-2">
              New GCC Customs Regulations Update
            </h4>
            <div class="flex items-center gap-2 text-slate-500 text-sm">
              <span>Jan 10, 2026</span>
              <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
              <span>6 min</span>
            </div>
          </div>
        </article>

        <!-- Article 4 -->
        <article class="group flex gap-5 bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-4" data-aos="fade-left" data-aos-delay="300">
          <div class="relative w-32 h-32 flex-shrink-0 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=400&q=80"
              alt="Article"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
          </div>
          <div class="flex flex-col justify-center">
            <span class="text-purple-600 text-xs font-bold uppercase tracking-wider mb-2">Case Study</span>
            <h4 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors line-clamp-2">
              500-Ton Equipment Delivery in 48 Hours
            </h4>
            <div class="flex items-center gap-2 text-slate-500 text-sm">
              <span>Jan 8, 2026</span>
              <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
              <span>10 min</span>
            </div>
          </div>
        </article>

      </div>
    </div>
  </div>
</section>

{{-- CTA STRIP (MODERNIZED) --}}
<section class="relative overflow-hidden bg-gradient-to-r from-cyan-600 to-blue-700">
  {{-- Animated background pattern --}}
  <div class="absolute inset-0 opacity-20">
    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
  </div>

  {{-- Floating shapes --}}
  <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2 animate-pulse" style="animation-delay: 1s;"></div>

  <div class="max-w-7xl mx-auto px-4 py-20 relative z-10">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
      <div class="text-center lg:text-left" data-aos="fade-right">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Ready to ship?</h2>
        <p class="text-white/80 text-lg max-w-xl">Get a fast, free quote for your shipment. Our team is ready to help you move cargo anywhere in the world.</p>

        <div class="mt-6 flex items-center gap-4 justify-center lg:justify-start text-white/70 text-sm">
          <span class="flex items-center gap-2">
            <i class="bi bi-check-circle-fill text-green-400"></i>
            No hidden fees
          </span>
          <span class="w-1 h-1 bg-white/40 rounded-full"></span>
          <span class="flex items-center gap-2">
            <i class="bi bi-check-circle-fill text-green-400"></i>
            Response in 2hrs
          </span>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-left">
        <a href="{{ route('contact') }}#quoteForm" class="group px-10 py-5 bg-white text-slate-900 rounded-full font-bold text-lg shadow-2xl hover:shadow-white/20 transition-all duration-300 hover:-translate-y-1 flex items-center gap-3">
          <span>Get Free Quote</span>
          <i class="bi bi-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
        </a>
        <a href="{{ route('contact') }}" class="px-10 py-5 border-2 border-white/30 text-white rounded-full font-bold text-lg hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 flex items-center gap-3">
          <i class="bi bi-telephone"></i>
          <span>Talk to Expert</span>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection