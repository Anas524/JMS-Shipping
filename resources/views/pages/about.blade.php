@extends('layouts.app')

@section('hideHeaderSpacer','1')
@section('title','JMS | About')

@section('content')

<!-- Hero Section with Parallax -->
<section class="relative h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1920&q=80"
            alt="Shipping vessel at sea"
            class="w-full h-full object-cover scale-110 animate-kenburns">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/60 to-slate-50"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
        <!-- <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full text-white/90 text-sm font-medium mb-6 border border-white/20">
            <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span>
            Since 2008
        </div> -->
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
            Navigating Global<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">Commerce</span>
        </h1>
        <p class="text-xl text-slate-200 max-w-2xl mx-auto font-light leading-relaxed">
            Connecting continents, delivering promises. Your trusted partner in international logistics and freight solutions.
        </p>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Stats Counter Section -->
<section class="relative -mt-20 z-20 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white rounded-2xl shadow-2xl shadow-slate-900/10 p-8 border border-slate-100">
            <div class="text-center group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors counter" data-target="150">0</div>
                <div class="text-slate-500 font-medium uppercase tracking-wider text-sm">Countries Served</div>
            </div>
            <div class="text-center group cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors counter" data-target="50000">0</div>
                <div class="text-slate-500 font-medium uppercase tracking-wider text-sm">Shipments/Year</div>
            </div>
            <div class="text-center group cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors counter" data-target="98">0</div>
                <div class="text-slate-500 font-medium uppercase tracking-wider text-sm">% On-Time Rate</div>
            </div>
            <div class="text-center group cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                <div class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors counter" data-target="24">0</div>
                <div class="text-slate-500 font-medium uppercase tracking-wider text-sm">/7 Support</div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-24 px-4 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative" data-aos="fade-right">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                    <img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=800&q=80"
                        alt="Container ship in port"
                        class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <!-- Floating Card -->
                <div class="absolute -bottom-8 -right-8 bg-white p-6 rounded-xl shadow-2xl max-w-xs hidden md:block animate-float z-50">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-slate-900">ISO Certified</div>
                            <div class="text-sm text-slate-500">Quality Management</div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-left">
                <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Our Story</span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 mb-6 leading-tight">
                    Our Vision for <br><span class="text-cyan-600">Global Logistics</span>
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-6">
                    JMS Shipping LLC was built with one clear purpose: to become a global leader in integrated air and sea logistics, and the world’s most trusted marine spare parts partner. We exist to keep global shipping moving—supporting safe, reliable, and uninterrupted operations for businesses across industries.
                </p>

                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    Through innovation, operational excellence, and seamless international logistics, we connect suppliers, vessels, and destinations with speed and precision. Whether it’s time-critical air freight, efficient sea freight, or marine spare parts delivered where they matter most, JMS is committed to transforming logistics into a smarter, more dependable experience.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('services') }}#services"
                        class="px-8 py-4 bg-slate-900 text-white rounded-full font-semibold hover:bg-cyan-600 transition-all duration-300 hover:shadow-lg hover:shadow-cyan-600/30 flex items-center gap-2 group">
                        Our Services
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <a href="{{ route('contact') }}"
                        class="px-8 py-4 border-2 border-slate-200 text-slate-900 rounded-full font-semibold hover:border-cyan-600 hover:text-cyan-600 transition-all duration-300">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section with Hover Effects -->
<section class="py-24 bg-slate-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, slate-900 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Why Choose Us</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 mb-6">Core Values That Drive Us</h2>
            <p class="text-slate-600 text-lg">Built on a foundation of integrity, innovation, and relentless pursuit of customer satisfaction.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Value Card 1 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-600 transition-colors duration-500">
                    <svg class="w-8 h-8 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Reliability</h3>
                <p class="text-slate-600 leading-relaxed">We deliver on our promises with precision timing and transparent communication throughout the shipping process.</p>
                <!-- <div class="mt-6 flex items-center text-cyan-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    Learn more
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div> -->
            </div>

            <!-- Value Card 2 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-600 transition-colors duration-500">
                    <svg class="w-8 h-8 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Security</h3>
                <p class="text-slate-600 leading-relaxed">State-of-the-art tracking systems and rigorous safety protocols ensure your cargo arrives intact and on schedule.</p>
                <!-- <div class="mt-6 flex items-center text-cyan-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    Learn more
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div> -->
            </div>

            <!-- Value Card 3 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-600 transition-colors duration-500">
                    <svg class="w-8 h-8 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Global Reach</h3>
                <p class="text-slate-600 leading-relaxed">Strategic partnerships across 150+ countries provide seamless door-to-door logistics solutions worldwide.</p>
                <!-- <div class="mt-6 flex items-center text-cyan-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    Learn more
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<!-- <section class="py-24 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Our Team</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 mb-6">Leadership That Inspires</h2>
            <p class="text-slate-600 text-lg">Meet the visionaries steering JMS Shipping toward a future of innovation and growth.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-2xl" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&q=80"
                    alt="CEO"
                    class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-white mb-1">James Mitchell</h3>
                    <p class="text-cyan-400 font-medium mb-4">Founder & CEO</p>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        20+ years in maritime logistics, pioneering sustainable shipping solutions across the Atlantic.
                    </p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&q=80"
                    alt="COO"
                    class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-white mb-1">Sarah Chen</h3>
                    <p class="text-cyan-400 font-medium mb-4">Chief Operations Officer</p>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        Expert in supply chain optimization with an MBA from MIT and a passion for operational excellence.
                    </p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl" data-aos="fade-up" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=600&q=80"
                    alt="CTO"
                    class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-white mb-1">Michael Rodriguez</h3>
                    <p class="text-cyan-400 font-medium mb-4">Chief Technology Officer</p>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        Leading our digital transformation with cutting-edge tracking and AI-driven logistics platforms.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- CTA Section -->
<section class="py-24 px-4 relative overflow-hidden">
    <div class="absolute inset-0 bg-slate-900">
        <img src="https://images.unsplash.com/photo-1605745341112-85968b19335b?w=1920&q=80"
            alt="Cargo containers"
            class="w-full h-full object-cover opacity-20">
    </div>
    <div class="max-w-4xl mx-auto text-center relative z-10" data-aos="zoom-in">
        <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">Ready to Ship?</h2>
        <p class="text-xl text-slate-300 mb-10 max-w-2xl mx-auto">
            Join thousands of businesses that trust JMS Shipping for their logistics needs. Get a quote in minutes.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}#quoteForm"
                class="px-10 py-5 bg-cyan-500 text-white rounded-full font-bold text-lg hover:bg-cyan-400 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-cyan-500/50 text-center">
                Get Free Quote
            </a>

            <a href="{{ route('contact') }}"
                class="px-10 py-5 bg-transparent border-2 border-white text-white rounded-full font-bold text-lg hover:bg-white hover:text-slate-900 transition-all duration-300 text-center">
                Contact Sales
            </a>
        </div>
    </div>
</section>

<!-- Trust Badges -->
<section class="py-16 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4">
        <p class="text-center text-slate-400 font-medium mb-8 uppercase tracking-wider text-sm">Trusted by Industry Leaders</p>
        <div class="flex flex-wrap justify-center items-center gap-12 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
            <div class="text-2xl font-bold text-slate-700">MAERSK</div>
            <div class="text-2xl font-bold text-slate-700">COSCO</div>
            <div class="text-2xl font-bold text-slate-700">MSC</div>
            <div class="text-2xl font-bold text-slate-700">DHL</div>
            <div class="text-2xl font-bold text-slate-700">FEDEX</div>
        </div>
    </div>
</section>

@endsection

@section('page','about')