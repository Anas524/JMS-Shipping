@extends('layouts.app')

@section('title','JMS | Services')

@section('hideHeaderSpacer', '1')

@section('content')

<!-- Hero Section with Video Background -->
<section id="servicesHero" class="relative h-screen min-h-[700px] flex items-center justify-center overflow-hidden">
    <!-- Video Background -->
    <div class="absolute inset-0 z-0">
        <video autoplay muted loop playsinline class="w-full h-full object-cover scale-110 animate-kenburns-slow">
            <!-- <source src="{{ asset('videos/shipping-bg.mp4') }}" type="video/mp4"> -->
            <!-- Fallback image -->
            <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1920&q=80" 
                 alt="Container ship at sea" 
                 class="w-full h-full object-cover">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/50 to-slate-900/90"></div>
    </div>
    
    <!-- Animated Particles Overlay -->
    <div class="absolute inset-0 z-0 opacity-30" id="particles"></div>
    
    <!-- Content -->
    <div class="relative z-10 text-center px-4 max-w-6xl mx-auto" data-aos="fade-up" data-aos-duration="1200">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full text-white/90 text-sm font-medium mb-6 border border-white/20 animate-pulse-slow">
            <span class="w-2 h-2 bg-cyan-400 rounded-full animate-ping"></span>
            Global Logistics Solutions
        </div>
        
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 leading-tight tracking-tight">
            Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-cyan-400 animate-gradient">Services</span>
        </h1>
        
        <p class="text-xl md:text-2xl text-slate-200 max-w-3xl mx-auto font-light leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="200">
            End-to-end shipping solutions tailored to move your business forward across oceans, skies, and borders.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
            <a href="#airFreight" class="group px-8 py-4 bg-cyan-500 text-white rounded-full font-semibold hover:bg-cyan-400 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-cyan-500/50 flex items-center justify-center gap-2">
                Explore Services
                <svg class="w-5 h-5 transition-transform group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
            <a href="{{ route('contact') }}#quoteForm" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white border border-white/30 rounded-full font-semibold hover:bg-white/20 transition-all duration-300 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Get Quote
            </a>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 animate-bounce-slow">
        <div class="w-8 h-12 border-2 border-white/30 rounded-full flex justify-center pt-2">
            <div class="w-1 h-3 bg-cyan-400 rounded-full animate-scroll-down"></div>
        </div>
    </div>
</section>

<!-- Floating Stats Bar -->
<section class="relative z-20 -mt-24 px-4 mb-20">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white rounded-3xl shadow-2xl shadow-slate-900/20 p-8 border border-slate-100 backdrop-blur-xl">
            <div class="text-center group" data-aos="fade-up" data-aos-delay="0">
                <div class="text-4xl font-bold text-slate-900 mb-1 group-hover:text-cyan-600 transition-colors counter" data-target="150">0</div>
                <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">Countries</div>
            </div>
            <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-bold text-slate-900 mb-1 group-hover:text-cyan-600 transition-colors counter" data-target="500">0</div>
                <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">Vessels</div>
            </div>
            <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-bold text-slate-900 mb-1 group-hover:text-cyan-600 transition-colors counter" data-target="24">0</div>
                <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">/7 Support</div>
            </div>
            <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl font-bold text-slate-900 mb-1 group-hover:text-cyan-600 transition-colors counter" data-target="99">0</div>
                <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">% Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid with Parallax -->
<section id="services" class="py-24 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-slate-50 to-white"></div>
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-cyan-200/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-200/30 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">What We Offer</span>
            <h2 class="text-4xl md:text-6xl font-bold text-slate-900 mt-4 mb-6">Comprehensive Logistics</h2>
            <p class="text-slate-600 text-lg">From air freight to ocean shipping, we provide integrated solutions that keep your supply chain moving efficiently.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            
            <!-- Air Freight -->
            <div id="airFreight" class="group relative h-[500px] rounded-3xl overflow-hidden cursor-pointer" data-aos="fade-right">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1200&q=80" 
                         alt="Air Freight" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-500"></div>
                </div>
                
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="w-16 h-16 bg-cyan-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-cyan-500/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-2">Air Freight</h3>
                        <p class="text-slate-300 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Express worldwide delivery with real-time tracking and priority handling for time-critical shipments.
                        </p>
                        <!-- <div class="flex items-center text-cyan-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200">
                            Learn more
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div> -->
                    </div>
                </div>
                
                <!-- Hover Border Effect -->
                <div class="absolute inset-0 border-2 border-cyan-500/0 group-hover:border-cyan-500/50 rounded-3xl transition-all duration-500"></div>
            </div>

            <!-- Sea Freight -->
            <div class="group relative h-[500px] rounded-3xl overflow-hidden cursor-pointer" data-aos="fade-left">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=1200&q=80" 
                         alt="Sea Freight" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-500"></div>
                </div>
                
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-blue-600/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-2">Sea Freight</h3>
                        <p class="text-slate-300 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Cost-effective FCL and LCL solutions with reliable scheduling and global port coverage.
                        </p>
                        <!-- <div class="flex items-center text-cyan-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200">
                            Learn more
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div> -->
                    </div>
                </div>
                <div class="absolute inset-0 border-2 border-blue-500/0 group-hover:border-blue-500/50 rounded-3xl transition-all duration-500"></div>
            </div>

            <!-- Land Transport -->
            <div class="group relative h-[500px] rounded-3xl overflow-hidden cursor-pointer" data-aos="fade-right" data-aos-delay="100">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=1200&q=80" 
                         alt="Land Transport" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-500"></div>
                </div>
                
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-emerald-600/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-2">Land Transport</h3>
                        <p class="text-slate-300 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Comprehensive trucking and rail solutions for regional and cross-border logistics.
                        </p>
                        <!-- <div class="flex items-center text-cyan-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200">
                            Learn more
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div> -->
                    </div>
                </div>
                <div class="absolute inset-0 border-2 border-emerald-500/0 group-hover:border-emerald-500/50 rounded-3xl transition-all duration-500"></div>
            </div>

            <!-- Customs Clearance -->
            <div class="group relative h-[500px] rounded-3xl overflow-hidden cursor-pointer" data-aos="fade-left" data-aos-delay="100">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?w=1200&q=80" 
                         alt="Customs Clearance" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-500"></div>
                </div>
                
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="w-16 h-16 bg-amber-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-amber-600/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-2">Customs Clearance</h3>
                        <p class="text-slate-300 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Expert documentation and compliance management for smooth international trade operations.
                        </p>
                        <!-- <div class="flex items-center text-cyan-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200">
                            Learn more
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div> -->
                    </div>
                </div>
                <div class="absolute inset-0 border-2 border-amber-500/0 group-hover:border-amber-500/50 rounded-3xl transition-all duration-500"></div>
            </div>

        </div>
    </div>
</section>

<!-- Process Section with Parallax -->
<section class="relative py-32 overflow-hidden bg-slate-900">
    <!-- Parallax Background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1605745341112-85968b19335b?w=1920&q=80')] bg-cover bg-center bg-fixed opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-900/95 to-slate-900"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-cyan-400 font-semibold tracking-wider uppercase text-sm">How We Work</span>
            <h2 class="text-4xl md:text-6xl font-bold text-white mt-4 mb-6">Simple 4-Step Process</h2>
            <p class="text-slate-400 text-lg">Streamlined logistics from quote to delivery with complete transparency.</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8 relative">
            <!-- Connecting Line -->
            <div class="hidden md:block absolute top-1/2 left-0 right-0 h-0.5 bg-gradient-to-r from-cyan-500/20 via-cyan-500 to-cyan-500/20 transform -translate-y-1/2 z-0"></div>

            <!-- Step 1 -->
            <div class="relative z-10 text-center group" data-aos="fade-up" data-aos-delay="0">
                <div class="w-20 h-20 mx-auto bg-slate-800 border-2 border-cyan-500/30 rounded-full flex items-center justify-center mb-6 group-hover:border-cyan-500 group-hover:scale-110 transition-all duration-500 relative">
                    <span class="text-3xl font-bold text-cyan-400">1</span>
                    <div class="absolute inset-0 rounded-full bg-cyan-500/20 animate-ping opacity-0 group-hover:opacity-100"></div>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Request Quote</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Share your shipment details and get instant competitive pricing.</p>
            </div>

            <!-- Step 2 -->
            <div class="relative z-10 text-center group" data-aos="fade-up" data-aos-delay="150">
                <div class="w-20 h-20 mx-auto bg-slate-800 border-2 border-cyan-500/30 rounded-full flex items-center justify-center mb-6 group-hover:border-cyan-500 group-hover:scale-110 transition-all duration-500 relative">
                    <span class="text-3xl font-bold text-cyan-400">2</span>
                    <div class="absolute inset-0 rounded-full bg-cyan-500/20 animate-ping opacity-0 group-hover:opacity-100"></div>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Book & Confirm</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Lock in your schedule with our easy booking confirmation system.</p>
            </div>

            <!-- Step 3 -->
            <div class="relative z-10 text-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 mx-auto bg-slate-800 border-2 border-cyan-500/30 rounded-full flex items-center justify-center mb-6 group-hover:border-cyan-500 group-hover:scale-110 transition-all duration-500 relative">
                    <span class="text-3xl font-bold text-cyan-400">3</span>
                    <div class="absolute inset-0 rounded-full bg-cyan-500/20 animate-ping opacity-0 group-hover:opacity-100"></div>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Track Shipment</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Real-time tracking with updates at every milestone.</p>
            </div>

            <!-- Step 4 -->
            <div class="relative z-10 text-center group" data-aos="fade-up" data-aos-delay="450">
                <div class="w-20 h-20 mx-auto bg-slate-800 border-2 border-cyan-500/30 rounded-full flex items-center justify-center mb-6 group-hover:border-cyan-500 group-hover:scale-110 transition-all duration-500 relative">
                    <span class="text-3xl font-bold text-cyan-400">4</span>
                    <div class="absolute inset-0 rounded-full bg-cyan-500/20 animate-ping opacity-0 group-hover:opacity-100"></div>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Delivery</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Safe, on-time delivery with proof of completion.</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Marquee -->
<section class="py-20 bg-cyan-500 overflow-hidden">
    <div class="relative flex overflow-x-hidden">
        <div class="animate-marquee whitespace-nowrap flex items-center gap-16 py-4">
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                Global Coverage
            </span>
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                Real-time Tracking
            </span>
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V7h5a1 1 0 011 1v5h2V8a3 3 0 00-3-3H6z" clip-rule="evenodd"></path><path d="M12 7a1 1 0 011-1h1a2 2 0 012 2v6a2 2 0 01-2 2h-1a1 1 0 110-2h1V8h-1a1 1 0 01-1-1z"></path></svg>
                24/7 Support
            </span>
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Insurance Protected
            </span>
            <!-- Duplicate for seamless loop -->
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                Global Coverage
            </span>
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                Real-time Tracking
            </span>
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h2a1 1 0 100-2H6V7h5a1 1 0 011 1v5h2V8a3 3 0 00-3-3H6z" clip-rule="evenodd"></path><path d="M12 7a1 1 0 011-1h1a2 2 0 012 2v6a2 2 0 01-2 2h-1a1 1 0 110-2h1V8h-1a1 1 0 01-1-1z"></path></svg>
                24/7 Support
            </span>
            <span class="text-4xl md:text-6xl font-bold text-white/20 flex items-center gap-4">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Insurance Protected
            </span>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Why JMS</span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 mb-6 leading-tight">
                    Technology-Driven <br>Logistics Excellence
                </h2>
                <p class="text-slate-600 text-lg mb-8 leading-relaxed">
                    We combine decades of industry expertise with cutting-edge technology to deliver seamless shipping experiences that keep your business moving.
                </p>
                
                <div class="space-y-6">
                    <div class="flex gap-4 group">
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-cyan-500 transition-colors duration-300">
                            <svg class="w-6 h-6 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Advanced Analytics</h3>
                            <p class="text-slate-600">Real-time data insights for optimized routing and cost management.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 group">
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-cyan-500 transition-colors duration-300">
                            <svg class="w-6 h-6 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Secure Handling</h3>
                            <p class="text-slate-600">End-to-end security protocols protecting your valuable cargo.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 group">
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-cyan-500 transition-colors duration-300">
                            <svg class="w-6 h-6 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Global Network</h3>
                            <p class="text-slate-600">Strategic partnerships spanning 150+ countries worldwide.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative" data-aos="fade-left">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&q=80" 
                         alt="Logistics Operations" 
                         class="w-full h-[600px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/20 to-transparent"></div>
                </div>
                
                <!-- Floating Stats Card -->
                <div class="absolute -bottom-8 -left-8 bg-white p-6 rounded-2xl shadow-2xl max-w-xs animate-float hidden md:block">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-slate-900">99.8%</div>
                            <div class="text-sm text-slate-500">Delivery Success Rate</div>
                        </div>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-cyan-400/30 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-blue-400/30 rounded-full blur-2xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-slate-900">
        <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1920&q=80" 
             alt="Shipping" 
             class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-900/90 to-slate-900/90"></div>
    </div>
    
    <div class="max-w-5xl mx-auto text-center relative z-10 px-4" data-aos="zoom-in">
        <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">Ready to Ship?</h2>
        <p class="text-xl text-slate-300 mb-10 max-w-2xl mx-auto">
            Get a personalized quote in minutes. Our logistics experts are standing by to optimize your supply chain.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}#quoteForm" class="px-10 py-5 bg-cyan-500 text-white rounded-full font-bold text-lg hover:bg-cyan-400 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-cyan-500/50 inline-flex items-center justify-center gap-2">
                Get Free Quote
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            <a href="{{ route('contact') }}" class="px-10 py-5 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-full font-bold text-lg hover:bg-white/20 transition-all duration-300 inline-flex items-center justify-center gap-2">
                Contact Sales
            </a>
        </div>
    </div>
</section>

@endsection

@section('page','services')