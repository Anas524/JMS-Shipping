@extends('layouts.app')
@section('title','JMS | Home')

{{-- Home needs hero behind header --}}
@section('mainClass','pt-0')
@section('hideHeaderSpacer','1')

@section('content')
<section id="jmsHero" class="relative h-[100svh] min-h-[640px] overflow-hidden">
  {{-- Slides --}}
  <div class="absolute inset-0">
    {{-- Slide 1: VIDEO --}}
    <div class="jms-slide is-active" data-type="video"
      data-title="Fast & Reliable Logistics for Air, Sea, Land & Customs"
      data-desc="End-to-end shipping with transparent communication and real-time support."
      data-btn1-label="Track Your Order"
      data-btn1-href="{{ route('quote') }}"
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
      data-btn1-href="{{ route('quote') }}"
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
      <a class="jms-social" href="#" target="_blank" aria-label="Facebook"
        class="jms-social"><i class="bi bi-facebook"></i></a>

      <a class="jms-social" href="#" target="_blank" aria-label="Instagram"
        class="jms-social"><i class="bi bi-instagram"></i></a>

      <a class="jms-social" href="#" target="_blank" aria-label="X"
        class="jms-social"><i class="bi bi-twitter-x"></i></a>
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
          <a id="heroBtn1" href="{{ route('quote') }}"
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

{{-- Next sections start here --}}
<section class="max-w-7xl mx-auto px-4 py-16">
  <h2 class="text-2xl font-bold">Our Services</h2>
  <p class="mt-2 text-slate-600">Air • Sea • Land • Customs • Project Cargo</p>
</section>
@endsection