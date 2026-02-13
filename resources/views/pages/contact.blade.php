@extends('layouts.app')

@section('title','JMS | Contact & Quote')

@section('hideHeaderSpacer', '1')

@section('content')

<!-- Hero Section with Dynamic Particles -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-900 pb-24 md:pb-32">
    <!-- Animated Background Grid -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-[linear-gradient(rgba(6,182,212,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(6,182,212,0.03)_1px,transparent_1px)] bg-[size:60px_60px]"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-900/90 to-slate-800"></div>
    </div>

    <!-- Floating Orbs -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/20 rounded-full blur-[100px] animate-float-slow"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px] animate-float-slow-reverse"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-400/10 rounded-full blur-[150px] animate-pulse-slow"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto pt-32 sm:pt-36 md:pt-40">
        <!-- <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 backdrop-blur-md rounded-full text-cyan-400 text-sm font-medium mb-6 border border-cyan-500/20" data-aos="fade-down">
            <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span>
            24/7 Support Available
        </div> -->

        <h1 class="text-5xl md:text-5xl lg:text-8xl font-bold text-white mb-6 leading-tight" data-aos="fade-up">
            Let's <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-cyan-400 animate-gradient-text">Connect</span>
        </h1>

        <p class="text-xl md:text-2xl text-slate-400 max-w-3xl mx-auto font-light leading-relaxed mb-12" data-aos="fade-up" data-aos-delay="200">
            Get in touch for inquiries or request a personalized quote for your shipping needs.
        </p>

        <!-- Toggle Switch -->
        <div class="flex justify-center mb-16" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-slate-800/50 backdrop-blur-xl p-1.5 rounded-2xl border border-slate-700 inline-flex">
                <button id="contactBtn" class="px-8 py-3 rounded-xl font-semibold transition-all duration-300 bg-cyan-500 text-white shadow-lg shadow-cyan-500/25">
                    Contact Us
                </button>
                <button id="quoteBtn" class="px-8 py-3 rounded-xl font-semibold transition-all duration-300 text-slate-400 hover:text-white">
                    Get Quote
                </button>
            </div>
        </div>

        <!-- Forms Container -->
        <div class="relative max-w-4xl mx-auto">

            <!-- Contact Form -->
            <div id="contactForm" class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 md:p-12 shadow-2xl" data-aos="zoom-in" data-aos-delay="600">
                <form id="contactInquiryForm" class="space-y-6" action="{{ route('inquiries.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="contact">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Full Name</label>
                            <input type="text" name="name" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="John Smith">
                        </div>
                        <div class="group">
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Email Address</label>
                            <input type="email" name="email" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="john@company.com">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Phone Number</label>
                            <input type="tel" name="phone"
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="+971 4 5784156">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Subject</label>
                            <select name="subject" class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 appearance-none cursor-pointer">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="sales">Sales</option>
                                <option value="support">Customer Support</option>
                                <option value="partnership">Partnership</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Message</label>
                        <textarea name="message" rows="4" required
                            class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 resize-none"
                            placeholder="Tell us how we can help you..."></textarea>
                    </div>

                    <button type="submit" class="group relative w-full py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold text-lg rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-500/25 hover:-translate-y-0.5">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Send Message
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    <p class="form-msg hidden mt-3 text-sm"></p>
                </form>
            </div>

            <!-- Quote Form (Hidden by default) -->
            <div id="quoteForm" class="hidden bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 md:p-12 shadow-2xl" data-aos="zoom-in">
                <form id="quoteInquiryForm" class="space-y-6" action="{{ route('inquiries.store') }}#quoteForm" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="quote">

                    <!-- Shipping Type -->
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-3 text-left">Shipping Type</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="shipment_type" value="air" class="peer hidden" checked>
                                <div class="p-4 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-center transition-all duration-300 peer-checked:border-cyan-500 peer-checked:bg-cyan-500/10 hover:border-slate-600">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    <span class="text-sm text-slate-300 peer-checked:text-white">Air</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="shipment_type" value="sea" class="peer hidden">
                                <div class="p-4 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-center transition-all duration-300 peer-checked:border-blue-500 peer-checked:bg-blue-500/10 hover:border-slate-600">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span class="text-sm text-slate-300 peer-checked:text-white">Sea</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="shipment_type" value="land" class="peer hidden">
                                <div class="p-4 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-center transition-all duration-300 peer-checked:border-emerald-500 peer-checked:bg-emerald-500/10 hover:border-slate-600">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                    </svg>
                                    <span class="text-sm text-slate-300 peer-checked:text-white">Land</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="shipment_type" value="multimodal" class="peer hidden">
                                <div class="p-4 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-center transition-all duration-300 peer-checked:border-purple-500 peer-checked:bg-purple-500/10 hover:border-slate-600">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    <span class="text-sm text-slate-300 peer-checked:text-white">Multi</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">From (Origin)</label>
                            <input type="text" name="origin" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="City, Country">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">To (Destination)</label>
                            <input type="text" name="destination" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="City, Country">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Cargo Weight (kg)</label>
                            <input type="number" name="weight" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="1000">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Dimensions (L×W×H)</label>
                            <input type="text" name="dimensions"
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300"
                                placeholder="cm">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Cargo Type</label>
                            <select name="cargo_type" class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 appearance-none cursor-pointer">
                                <option value="general">General Cargo</option>
                                <option value="perishable">Perishable</option>
                                <option value="hazardous">Hazardous</option>
                                <option value="fragile">Fragile</option>
                                <option value="oversized">Oversized</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Your Name</label>
                            <input type="text" name="name" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Email Address</label>
                            <input type="email" name="email" required
                                class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300">
                        </div>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2 text-left">Additional Requirements</label>
                        <textarea name="notes" rows="3"
                            class="w-full px-5 py-4 bg-slate-800/50 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 resize-none"
                            placeholder="Special handling instructions, insurance requirements, etc."></textarea>
                    </div>

                    <button type="submit" class="group relative w-full py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold text-lg rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-500/25 hover:-translate-y-0.5">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Request Quote
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    <p class="form-msg hidden mt-3 text-sm"></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator (show only when hero is clean, not on small screens) -->
    <div id="heroScrollHint" class="hidden lg:block absolute bottom-8 left-1/2 -translate-x-1/2 z-10 pointer-events-none animate-bounce-slow">
        <div class="w-6 h-10 border-2 border-slate-600 rounded-full flex justify-center pt-2">
            <div class="w-1.5 h-3 bg-cyan-400 rounded-full animate-scroll-down"></div>
        </div>
    </div>
</section>

<!-- Contact Info Cards with Parallax -->
<section class="relative py-24 bg-slate-50 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-cyan-200/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-200/30 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Get in Touch</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 mb-6">Multiple Ways to Reach Us</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Phone -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="0">
                <div class="w-16 h-16 bg-cyan-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-cyan-500 transition-all duration-300">
                    <svg class="w-8 h-8 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Phone</h3>
                <p class="text-slate-600 mb-4">24/7 Customer Support</p>
                <a href="tel:+97145784156" class="text-cyan-600 font-semibold hover:text-cyan-700 transition-colors">+971 4 5784156</a>
            </div>

            <!-- Email -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-500 transition-all duration-300">
                    <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Email</h3>
                <p class="text-slate-600 mb-4">Send us your inquiries</p>
                <a href="mailto:info@jmsshipping.com" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">info@jmsshipping.com</a>
            </div>

            <!-- Location -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-emerald-500 transition-all duration-300">
                    <svg class="w-8 h-8 text-emerald-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Office</h3>
                <p class="text-slate-600 mb-4">Visit our Dubai office</p>
                <span class="text-emerald-600 font-semibold">Suite #03-05, 22A Street,<br>
                    Al Khabaishi, Dubai, UAE</span>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map" class="relative h-[500px] bg-slate-200" data-aos="fade-in">
    <iframe
        src="https://www.google.com/maps?q=Suite%20%2303-05%2C%2022A%20Street%2C%20Al%20Khabaishi%2C%20Dubai%2C%20UAE&output=embed"
        width="100%"
        height="100%"
        style="border:0; filter: grayscale(20%) contrast(1.1);"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="absolute inset-0">
    </iframe>

    <!-- Map Overlay Card -->
    <div class="absolute bottom-8 left-8 max-w-sm bg-white/95 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-white/20 hidden md:block">
        <h4 class="font-bold text-slate-900 mb-2">JMS Shipping LLC</h4>
        <p class="text-sm text-slate-600 leading-relaxed">
            P.O Box: 77106, Dubai, UAE<br>
            Suite #03-05, 22A Street,<br>
            Al Khabaishi, Dubai, UAE
        </p>
        <a href="https://www.google.com/maps?q=Suite+%2303-05,+22A+Street,+Al+Khabaishi,+Dubai,+UAE"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 mt-4 text-cyan-600 font-semibold text-sm hover:text-cyan-700 transition-colors">
            Get Directions
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
        </a>
    </div>
</section>
@endsection

@section('page','contact')