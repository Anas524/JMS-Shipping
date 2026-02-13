{{-- WhatsApp Chat Widget --}}
<div id="whatsapp-widget"
  class="fixed bottom-5 right-5 z-[999999] pointer-events-auto flex flex-col items-end gap-3">
  {{-- Popup --}}
  <div id="whatsapp-popup"
    class="hidden absolute bottom-[70px] right-0 pointer-events-auto bg-white rounded-2xl shadow-2xl p-4 max-w-xs transform transition-all duration-300 origin-bottom-right scale-95 opacity-0 translate-y-4 border border-gray-100">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-3 pb-3 border-b border-gray-100">
      <div class="w-10 h-10 rounded-full bg-[#25D366] flex items-center justify-center">
        <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp" class="w-5 h-5">
      </div>
      <div>
        <h4 class="font-semibold text-gray-800 text-sm">JMS Shipping</h4>
        <p class="text-xs text-green-600 flex items-center gap-1">
          <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
          Typically replies in 10 minutes
        </p>
      </div>
    </div>

    {{-- Quick Options --}}
    <div class="space-y-2 mb-4">
      <p class="text-xs text-gray-500 uppercase tracking-wider font-medium mb-2">Quick Options</p>

      <button type="button" data-whatsapp-type="quote"
        class="whatsapp-action-btn group w-full text-left px-4 py-3 rounded-xl bg-gray-50 hover:bg-green-50 hover:text-green-700 transition flex items-center gap-3">
        <span class="text-xl">📦</span>
        <div>
          <span class="block text-sm font-medium">Get a Quote</span>
          <span class="block text-xs text-gray-500 group-hover:text-green-600">Request shipping rates</span>
        </div>
      </button>

      <button type="button" data-whatsapp-type="track"
        class="whatsapp-action-btn group w-full text-left px-4 py-3 rounded-xl bg-gray-50 hover:bg-green-50 hover:text-green-700 transition flex items-center gap-3">
        <span class="text-xl">🔍</span>
        <div>
          <span class="block text-sm font-medium">Track Shipment</span>
          <span class="block text-xs text-gray-500 group-hover:text-green-600">Check your delivery status</span>
        </div>
      </button>

      <button type="button" data-whatsapp-type="support"
        class="whatsapp-action-btn group w-full text-left px-4 py-3 rounded-xl bg-gray-50 hover:bg-green-50 hover:text-green-700 transition flex items-center gap-3">
        <span class="text-xl">💬</span>
        <div>
          <span class="block text-sm font-medium">General Support</span>
          <span class="block text-xs text-gray-500 group-hover:text-green-600">Ask us anything</span>
        </div>
      </button>
    </div>

    {{-- Custom Message --}}
    <div class="border-t border-gray-100 pt-3">
      <p class="text-xs text-gray-500 mb-2">Or type your own message:</p>
      <div class="flex gap-2">
        <input type="text" id="custom-message"
          class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
          placeholder="Type here...">
        <button type="button" id="whatsapp-custom-send"
          class="px-3 py-2 bg-[#25D366] text-white rounded-lg hover:opacity-90 transition">
          Send
        </button>
      </div>
    </div>

    {{-- Close --}}
    <button type="button"
      class="close-btn absolute -top-2 -right-2 w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded-full grid place-items-center text-gray-600">
      ✕
    </button>
  </div>

  {{-- Floating main button --}}
  <button type="button" id="whatsapp-toggle-btn"
    aria-label="Chat on WhatsApp"
    class="pointer-events-auto w-14 h-14 rounded-full bg-[#25D366] shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 flex items-center justify-center group relative overflow-hidden">

    <span class="absolute inset-0 rounded-full bg-white opacity-0 group-hover:animate-ping pointer-events-none"></span>

    <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp" class="w-7 h-7 relative z-10 pointer-events-none">

    {{-- badge (this is the red dot bouncing you saw) --}}
    <!-- <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">1</span> -->
  </button>

</div>
