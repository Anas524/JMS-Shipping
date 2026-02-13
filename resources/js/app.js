import './bootstrap';
import Lenis from 'lenis';
import $ from 'jquery';
window.$ = window.jQuery = $;

import AOS from 'aos';
import 'aos/dist/aos.css';

$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

if (AOS && typeof AOS.init === 'function') {
  AOS.init({
    once: true,
    offset: 100,
    duration: 800,
    easing: 'ease-out-cubic',
    disable: () => window.innerWidth < 768,
  });

  $(window).on('resize', () => AOS.refresh());
}

const lenis = new Lenis({
  duration: 1.6,
  smoothWheel: true,
  smoothTouch: false,
});

window.__lenis = lenis;

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

$(function () {

  // -------- Scroll Manager (ONE handler) --------
  let __scrollTasks = [];
  let __scrollTicking = false;

  function addScrollTask(key, fn) {
    // remove if exists, then add (prevents duplicates)
    __scrollTasks = __scrollTasks.filter(t => t.key !== key);
    __scrollTasks.push({ key, fn });
  }
  function removeScrollTask(key) {
    __scrollTasks = __scrollTasks.filter(t => t.key !== key);
  }

  function bindScrollManager() {
    $(window).off('scroll.app').on('scroll.app', function () {
      if (__scrollTicking) return;
      __scrollTicking = true;
      requestAnimationFrame(() => {
        __scrollTicking = false;

        const y = window.scrollY || $(window).scrollTop() || 0;
        const vh = window.innerHeight || $(window).height() || 0;

        for (const t of __scrollTasks) {
          try { t.fn(y, vh); } catch (e) { }
        }
      });
    });

    // run once at start
    $(window).trigger('scroll.app');
  }

  bindScrollManager();

  // anchor smooth
  $(document).on('click', 'a[href^="#"]', function (e) {
    const id = $(this).attr('href');
    if (!id || id === '#') return;

    const $target = $(id);
    if ($target.length) {
      e.preventDefault();
      lenis.scrollTo($target[0], { offset: -110 });
    }
  });

  // HERO slider
  (function initHeroSlider() {
    const $hero = $("#jmsHero");
    if (!$hero.length) return;

    $hero.on("pointerdown.jmsDotBlock", ".jms-dots, .jms-dot", function (e) {
      e.stopPropagation();
    });

    const $slides = $hero.find(".jms-slide");
    const $dots = $hero.find(".jms-dot");
    if (!$slides.length) return;

    const $copy = $("#heroCopy");
    const $title = $("#heroTitle");
    const $desc = $("#heroDesc");
    const $btn1 = $("#heroBtn1");
    const $btn2 = $("#heroBtn2");

    let idx = 0;
    let timer = null;
    const VIDEO_FALLBACK_DELAY = 8000;

    function stopTimer() {
      if (timer) { clearTimeout(timer); timer = null; }
    }

    function applyCopy($active) {
      if (!$copy.length) return;

      const title = $active.data("title") || "";
      const desc = $active.data("desc") || "";
      const b1t = $active.data("btn1-label") || "Get a Quote";
      const b1h = $active.data("btn1-href") || "#";
      const b2t = $active.data("btn2-label") || "View Services";
      const b2h = $active.data("btn2-href") || "#";

      $copy.addClass("is-fading");
      setTimeout(() => {
        $title.text(title);
        $desc.text(desc);
        $btn1.text(b1t).attr("href", b1h);
        $btn2.text(b2t).attr("href", b2h);
        $copy.removeClass("is-fading");
      }, 180);
    }

    function pauseAllVideos() {
      $slides.find("video").each(function () {
        try {
          this.onended = null;
          this.pause();
          // reset to first frame
          this.currentTime = 0;
        } catch (e) { }
      });
    }

    function setActive(i) {
      stopTimer();
      idx = (i + $slides.length) % $slides.length;

      $slides.removeClass("is-active").eq(idx).addClass("is-active");
      $dots.removeClass("is-active").eq(idx).addClass("is-active");

      const $active = $slides.eq(idx);
      applyCopy($active);

      pauseAllVideos();

      const type = $active.data("type");

      if (type === "video") {
        const v = $active.find("video").get(0);

        if (v) {
          // make sure only active slide video is playable
          v.muted = true;
          v.playsInline = true;

          // restart cleanly
          try { v.currentTime = 0; } catch (e) { }

          const playPromise = v.play();
          if (playPromise && typeof playPromise.catch === "function") {
            playPromise.catch(() => {
              // If browser blocks play, fallback timer
              timer = setTimeout(() => setActive(idx + 1), VIDEO_FALLBACK_DELAY);
            });
          }

          v.onended = () => setActive(idx + 1);
        } else {
          timer = setTimeout(() => setActive(idx + 1), VIDEO_FALLBACK_DELAY);
        }
      } else {
        timer = setTimeout(() => setActive(idx + 1), 6000);
      }
    }

    function next() { setActive(idx + 1); }
    function prev() { setActive(idx - 1); }

    // dots
    $hero.off("click.jmsHeroDot").on("click.jmsHeroDot", ".jms-dot", function (e) {
      e.preventDefault();
      e.stopPropagation();
      setActive(Number($(this).data("index")) || 0);
    });

    // keyboard arrows
    $(document).off("keydown.jmsHero").on("keydown.jmsHero", function (e) {
      const tag = (e.target && e.target.tagName) ? e.target.tagName.toLowerCase() : "";
      if (tag === "input" || tag === "textarea" || tag === "select") return;

      if (e.key === "ArrowRight") { e.preventDefault(); next(); }
      if (e.key === "ArrowLeft") { e.preventDefault(); prev(); }
    });

    // drag / swipe (mouse + touch via pointer events)
    let dragging = false;
    let startX = 0;
    let fired = false;

    $hero.css("cursor", "grab");

    $hero.off("pointerdown.jmsHero").on("pointerdown.jmsHero", function (e) {
      // If user clicked dots/buttons/links, don't capture pointer
      if ($(e.target).closest(".jms-dots, .jms-dot, a, button").length) return;

      dragging = true;
      fired = false;
      startX = e.clientX;
      $hero.css("cursor", "grabbing");
      this.setPointerCapture?.(e.pointerId);
    });

    $hero.off("pointermove.jmsHero").on("pointermove.jmsHero", function (e) {
      if (!dragging || fired) return;

      const dx = e.clientX - startX;
      if (Math.abs(dx) > 70) { // threshold
        fired = true;
        if (dx < 0) next();
        else prev();
      }
    });

    function endDrag() {
      dragging = false;
      fired = false;
      $hero.css("cursor", "grab");
    }

    $hero.off("pointerup.jmsHero pointercancel.jmsHero").on("pointerup.jmsHero pointercancel.jmsHero", endDrag);

    // init
    setActive(0);
  })();

  // Active nav link highlight
  (function markActiveNav() {
    const path = window.location.pathname.replace(/\/+$/, '') || '/';

    $(".jms-navlink").each(function () {
      // only for <a> tags
      if (this.tagName.toLowerCase() !== 'a') return;

      const rawHref = $(this).attr('href');
      if (!rawHref || rawHref === '#') return;

      // build absolute URL safely
      const hrefPath = new URL(rawHref, window.location.origin)
        .pathname.replace(/\/+$/, '') || '/';

      if (hrefPath === path) $(this).addClass("is-active");
    });
  })();

  // ===== Services Mega Menu =====
  (function initServicesMega() {
    const $root = $("#svcRoot");
    const $btn = $("#svcBtn");
    const $panel = $("#svcPanel");
    const $overlay = $("#svcOverlay");
    const $items = $(".svc-item");
    const $panes = $(".svc-pane");

    if (!$root.length || !$btn.length || !$panel.length || !$overlay.length) return;

    const OPEN_DELAY = 120;
    const CLOSE_DELAY = 450;
    let tOpen = null;
    let tClose = null;

    function setPane(key) {
      $items.removeClass("is-active").filter(`[data-pane="${key}"]`).addClass("is-active");
      $panes.removeClass("is-active").filter(`[data-pane="${key}"]`).addClass("is-active");
    }

    function setState(state) {
      $panel.attr("data-state", state); // compact | expanded
      positionPanel(state);
    }

    // Position panel under Services button
    function positionPanel(state) {
      const btn = $btn.get(0);
      const panel = $panel.get(0);
      if (!btn || !panel) return;

      const r = btn.getBoundingClientRect();

      const PAD = 24;
      const GAP_Y = 8;          // slightly below Services (was 14)
      const COMPACT_W = 280;
      const EXPANDED_MAX = 760;

      const top = Math.round(r.bottom + GAP_Y);

      const maxW = Math.min(EXPANDED_MAX, window.innerWidth - (PAD * 2));
      const w = (state === "expanded") ? maxW : COMPACT_W;

      // center compact menu under Services button
      const centerX = r.left + (r.width / 2);
      let compactLeft = Math.round(centerX - (COMPACT_W / 2));

      // anchor for expand (keep compact right edge fixed)
      const anchorRight = compactLeft + COMPACT_W;

      let left = (state === "expanded") ? (anchorRight - w) : compactLeft;

      // clamp to viewport
      left = Math.max(PAD, Math.min(left, window.innerWidth - w - PAD));

      panel.style.top = `${top}px`;
      panel.style.left = `${left}px`;
      panel.style.width = `${w}px`;
    }

    function openMenu() {
      clearTimeout(tClose);
      clearTimeout(tOpen);
      tOpen = setTimeout(() => {
        $root.addClass("is-open");
        $("#siteHeader").addClass("svc-open");
        $btn.attr("aria-expanded", "true");
        $overlay.removeClass("hidden opacity-0 pointer-events-none")
          .addClass("opacity-100 pointer-events-auto");

        setState("compact"); // start compact like Digitron
      }, OPEN_DELAY);
    }

    function closeMenu() {
      clearTimeout(tOpen);
      clearTimeout(tClose);

      tClose = setTimeout(() => {
        // if mouse is still over root or panel, don't close
        const overRoot = $root.is(":hover");
        const overPanel = $panel.is(":hover");
        if (overRoot || overPanel) return;

        $root.removeClass("is-open");
        $btn.attr("aria-expanded", "false");
        $overlay.removeClass("opacity-100 pointer-events-auto")
          .addClass("opacity-0 pointer-events-none");

        setTimeout(() => $overlay.addClass("hidden"), 250);
        $("#siteHeader").removeClass("svc-open");
        setState("compact");
      }, CLOSE_DELAY);
    }

    // open when mouse enters button/root OR panel
    $root.on("mouseenter", openMenu);
    $panel.on("mouseenter", openMenu);

    // close only when leaving BOTH root and panel (with delay)
    $root.on("mouseleave", closeMenu);
    $panel.on("mouseleave", closeMenu);

    $btn.on("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      if ($root.hasClass("is-open")) closeMenu();
      else openMenu();
    });

    // prevent clicks inside panel from closing
    $panel.on("click", function (e) { e.stopPropagation(); });

    // click anywhere else closes
    $(document).on("click.svcOutside", function () {
      if ($root.hasClass("is-open")) closeMenu();
    });

    $overlay.on("click", closeMenu);

    $(document).on("keydown.svcMega", function (e) {
      if (e.key === "Escape") closeMenu();
    });

    // Hover left list expands menu to the left
    $items.on("mouseenter focus", function () {
      setPane($(this).data("pane"));
      setState("expanded");
    });

    // if we need to open mega menu on click use this
    // $items.on("click", function () {
    //   setPane($(this).data("pane"));
    // });

    // Keep correct position on resize/scroll
    $(window).on("resize.svcPos scroll.svcPos", function () {
      if ($root.hasClass("is-open")) {
        positionPanel($panel.attr("data-state") || "compact");
      }
    });

    // defaults
    setPane("air");
    setState("compact");
  })();

  // Mobile Menu - Modernized
  (function initMobileMenu() {
    const $navBtn = $("#navBtn");
    const $mobileNav = $("#mobileNav");
    const $mobileMenu = $("#mobileMenu");
    const $mobileBackdrop = $("#mobileBackdrop");
    const $mobileClose = $("#mobileClose");
    const $mobileServicesBtn = $("#mobileServicesBtn");
    const $mobileServicesMenu = $("#mobileServicesMenu");
    const $mobileServicesArrow = $("#mobileServicesArrow");

    function openMenu() {
      $navBtn.addClass("active");
      $mobileNav.removeClass("hidden");
      setTimeout(() => {
        $mobileBackdrop.addClass("open");
        $mobileMenu.addClass("open");
      }, 10);
      $("body").css("overflow", "hidden");
    }

    function closeMenu() {
      $navBtn.removeClass("active");
      $mobileBackdrop.removeClass("open");
      $mobileMenu.removeClass("open");
      setTimeout(() => {
        $mobileNav.addClass("hidden");
      }, 300);
      $("body").css("overflow", "");
    }

    window.openMobileNav = openMenu;
    window.closeMobileNav = closeMenu;

    $navBtn.on("click", () => {
      if ($mobileNav.hasClass("hidden")) openMenu();
      else closeMenu();
    });

    $mobileClose.on("click", closeMenu);
    $mobileBackdrop.on("click", closeMenu);

    $mobileServicesBtn.off("click").on("click", function (e) {
      e.preventDefault();
      $mobileServicesMenu.toggleClass("hidden");
      $mobileServicesArrow.toggleClass("rotate-180");
    });

    // Close on link click
    $("#mobileMenu a").on("click", () => {
      setTimeout(closeMenu, 100);
    });
  })();

  // ===== WhatsApp Widget =====
  (function initWhatsAppWidget() {
    if (window.__wa_inited) return;
    window.__wa_inited = true;

    const WHATSAPP_NUMBER = '971542322309'; // digits only, no '+'
    const COMPANY_NAME = 'JMS Shipping';

    const $popup = $('#whatsapp-popup');

    function getContextMessage() {
      const pageTitle = document.title || 'JMS';
      const url = window.location.href;
      return `Hi ${COMPANY_NAME}, I need support. (Page: ${pageTitle}) ${url}`;
    }

    const messages = {
      quote: () => `Hi ${COMPANY_NAME}, I need a shipping quote. Please share rates.`,
      track: () => `Hi ${COMPANY_NAME}, I need to track my shipment. Tracking number: `,
      support: () => getContextMessage(),
      custom: () => ''
    };

    function openPopup() {
      $popup.removeClass('hidden')
        .removeClass('opacity-0', 'translate-y-4', 'scale-95')
        .addClass('opacity-100', 'translate-y-0', 'scale-100');
    }

    function closePopup() {
      $popup.addClass('opacity-0', 'translate-y-4', 'scale-95')
        .removeClass('opacity-100', 'translate-y-0', 'scale-100');

      setTimeout(() => $popup.addClass('hidden'), 200);
    }

    function togglePopup() {
      if ($popup.hasClass('hidden')) openPopup();
      else closePopup();
    }

    function buildWhatsAppUrl(message) {
      const phone = String(WHATSAPP_NUMBER || '').replace(/\D/g, ''); // digits only
      const text = encodeURIComponent(message);

      const isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);

      // Mobile opens app nicely
      if (isMobile) return `https://wa.me/${phone}?text=${text}`;

      // Desktop opens WhatsApp Web (NO 404)
      return `https://web.whatsapp.com/send?phone=${phone}&text=${text}`;
    }

    function openWhatsApp(type) {
      let msg = (messages[type] ? messages[type]() : getContextMessage());

      if (type === 'custom') {
        const customText = ($('#custom-message').val() || '').trim();
        msg = customText || getContextMessage();
        $('#custom-message').val('');
      }

      const url = buildWhatsAppUrl(msg);
      window.open(url, '_blank', 'noopener,noreferrer');
      closePopup();
    }

    $('#whatsapp-toggle-btn').off('click.whatsapp').on('click.whatsapp', function (e) {
      e.preventDefault();
      e.stopPropagation();
      togglePopup();
    });

    // toggle
    // $(document).on('click', '#whatsapp-toggle-btn', function (e) {
    //   e.preventDefault();
    //   e.stopPropagation();
    //   togglePopup();
    // });

    // close btn
    $(document).on('click', '#whatsapp-popup .close-btn', function (e) {
      e.preventDefault();
      e.stopPropagation();
      closePopup();
    });

    // quick options
    $(document).on('click', '.whatsapp-action-btn', function (e) {
      e.preventDefault();
      e.stopPropagation();
      openWhatsApp($(this).data('whatsapp-type'));
    });

    // custom send
    $(document).on('click', '#whatsapp-custom-send', function (e) {
      e.preventDefault();
      e.stopPropagation();
      openWhatsApp('custom');
    });

    // enter on input
    $(document).on('keydown', '#custom-message', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        e.stopPropagation();
        openWhatsApp('custom');
      }
    });

    // click outside closes
    $(document).on('click', function (e) {
      if ($popup.hasClass('hidden')) return;
      if ($(e.target).closest('#whatsapp-widget').length === 0) closePopup();
    });

    // esc closes
    $(document).on('keydown', function (e) {
      if (e.key === 'Escape') closePopup();
    });

    console.log('WhatsApp widget loaded');
  })();

  // Preloader hide
  (function initPreloaderOncePerTab() {
    const loader = document.getElementById('pageLoader');
    if (!loader) return;

    const MIN_MS = 900;
    const MAX_MS = 4000;
    const start = Date.now();
    let hidden = false;

    // detect hard reload
    const navEntry = performance.getEntriesByType?.('navigation')?.[0];
    const isReload = navEntry ? navEntry.type === 'reload' : false;

    // show only first time in this tab OR hard reload
    const KEY = 'jms_loader_shown';
    const firstTimeInTab = !sessionStorage.getItem(KEY);

    if (!(firstTimeInTab || isReload)) {
      loader.remove(); // never show on normal page navigation
      return;
    }

    // mark as shown for this tab
    sessionStorage.setItem(KEY, '1');

    // show loader
    loader.classList.add('is-visible');

    function hide() {
      if (hidden) return;
      hidden = true;
      loader.classList.add('is-hidden');
      loader.classList.remove('is-visible');
      setTimeout(() => loader.remove(), 450);
    }

    function hideWithMinDelay() {
      const elapsed = Date.now() - start;
      const wait = Math.max(0, MIN_MS - elapsed);
      setTimeout(hide, wait);
    }

    window.addEventListener("load", hideWithMinDelay, { once: true });
    setTimeout(hide, MAX_MS);
  })();


  (function initCountUp() {
    const $section = $('#jmsStats');
    if (!$section.length) return;

    const $nums = $section.find('.jms-count');
    if (!$nums.length) return;

    function fmt(n) { return n.toLocaleString('en-US'); }

    function setZero() {
      $nums.each(function () {
        const suffix = this.dataset.suffix || '';
        this.textContent = `0${suffix}`;
        this.dataset.ran = '0';
      });
    }

    function animate(el) {
      if (el.dataset.ran === '1') return;
      el.dataset.ran = '1';

      const to = Number(el.dataset.to || 0);
      const suffix = el.dataset.suffix || '';
      const duration = 1200;

      const start = performance.now();

      function tick(now) {
        const t = Math.min(1, (now - start) / duration);
        const eased = 1 - Math.pow(1 - t, 3);
        const val = Math.round(to * eased);
        el.textContent = `${fmt(val)}${suffix}`;
        if (t < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
    }

    function runAll() { $nums.each(function () { animate(this); }); }

    setZero();

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) runAll();
          else setZero();
        });
      }, {
        threshold: 0.12,
        rootMargin: '0px 0px -20% 0px'
      });

      io.observe($section.get(0));

      // IMPORTANT for Lenis: refresh IO on smooth scroll
      if (window.__lenis && typeof window.__lenis.on === 'function') {
        window.__lenis.on('scroll', () => {
          // triggers observer recalculation on some mobiles
          io.takeRecords();
        });
      }

    } else {
      function inView() {
        const rect = $section.get(0).getBoundingClientRect();
        return rect.top < window.innerHeight * 0.65 && rect.bottom > window.innerHeight * 0.35;
      }

      let wasIn = false;
      function onScroll() {
        const nowIn = inView();
        if (nowIn && !wasIn) runAll();
        if (!nowIn && wasIn) setZero();
        wasIn = nowIn;
      }

      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
    }
  })();

  // FAQ accordion
  $(document).off('click.jmsFaq').on('click.jmsFaq', '.jms-faq-q', function () {
    const $item = $(this).closest('.jms-faq-item');
    const $list = $('#faqList');

    // close others (like the screenshot)
    $list.find('.jms-faq-item').not($item).removeClass('is-open');

    // toggle current
    $item.toggleClass('is-open');
  });

  // Stagger animation setup for grid items
  $('[data-aos="fade-up"]').each(function (index) {
    $(this).css('animation-delay', (index * 100) + 'ms');
  });

  // Magnetic Button Effect - jQuery version
  $('button, .magnetic').on('mousemove', function (e) {
    const $this = $(this);
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left - rect.width / 2;
    const y = e.clientY - rect.top - rect.height / 2;

    $this.css('transform', 'translate(' + (x * 0.1) + 'px, ' + (y * 0.1) + 'px)');
  }).on('mouseleave', function () {
    $(this).css('transform', 'translate(0, 0)');
  });

  // Reveal text animations on load
  $('p, h1, h2, h3').css({
    'opacity': '1',
    'transform': 'translateY(0)'
  });

  // Navbar background change on scroll
  addScrollTask('navScrolled', (y) => {
    const $nav = $('nav, .navbar, header');
    if (y > 100) $nav.addClass('scrolled');
    else $nav.removeClass('scrolled');
  });

  // Trust badges hover effect
  $('.grayscale').hover(
    function () {
      $(this).removeClass('grayscale');
    },
    function () {
      $(this).addClass('grayscale');
    }
  );

  // Team card hover - ensure proper z-index handling
  $('.group').on('mouseenter', function () {
    $(this).css('z-index', '10');
  }).on('mouseleave', function () {
    $(this).css('z-index', '1');
  });

  console.log('JMS About Page JS Loaded Successfully');

  // Modern FAQ Accordion
  $(document).on('click', '.faq-modern-header', function () {
    const $item = $(this).closest('.faq-modern-item');
    const $list = $('#faqList');

    // Close others
    $list.find('.faq-modern-item').not($item).removeClass('active');

    // Toggle current
    $item.toggleClass('active');
  });

  // Initialize first FAQ as open
  $('.faq-modern-item:first').addClass('active');

  (function initWhyJmsStoryLite() {
    const $story = $('#whyJmsStory');
    if (!$story.length) return;

    // set backgrounds once
    $story.find('[data-bg]').each(function () {
      const url = $(this).attr('data-bg');
      if (url) this.style.backgroundImage = `url("${url}")`;
    });

    const $cols = $story.find('.jms-why-col');
    const copies = $story.find('.jms-why-copy').toArray();

    // header overlay toggle (optional, lightweight)
    const header = document.getElementById('siteHeader');
    if (header) {
      const io = new IntersectionObserver(([entry]) => {
        header.classList.toggle('why-over', entry.isIntersecting);
      }, { threshold: 0.12 });
      io.observe($story.get(0));
    }

    let top = 0, height = 1, vh = window.innerHeight || 800;
    let ticking = false;
    let lastY = window.scrollY || 0;

    function clamp(n, a, b) { return Math.max(a, Math.min(b, n)); }

    function measure() {
      vh = window.innerHeight || 800;
      const rect = $story.get(0).getBoundingClientRect();
      top = rect.top + (window.scrollY || 0);
      height = $story.get(0).offsetHeight || 1;
    }

    function render() {
      ticking = false;

      const denom = Math.max(1, height - vh);
      const p = clamp((lastY - top) / denom, 0, 1);
      // slow + smooth easing (0..1)
      const ease = (t) => 1 - Math.pow(1 - t, 3);   // easeOutCubic
      const pSlow = ease(p * 0.40);                 // 0.92 = slightly slower overall

      const isMobile = window.matchMedia('(max-width: 980px)').matches;

      if (isMobile) {
        const idx = (p < 0.34) ? 0 : (p < 0.67 ? 1 : 2);
        $cols.removeClass('is-active').eq(idx).addClass('is-active');
        return;
      }

      // SUPER LIGHT motion but SAME END LINE for all
      // Desktop: move each copy down until near bottom of the image
      for (let i = 0; i < copies.length; i++) {
        const el = copies[i];

        const speed = Number(el.getAttribute('data-speed') || 0.6); // 0.4..0.8
        const headerSpace = parseFloat(getComputedStyle(document.documentElement)
          .getPropertyValue('--jms-header-space')) || 110;

        // sticky visible height
        const stickyH = vh - headerSpace;

        // current top from CSS (ex: top: 120px)
        const startTop = parseFloat(getComputedStyle(el).top) || 120;

        // element height
        const elH = el.getBoundingClientRect().height;

        // how much space is left to move down until bottom
        const padBottom = 24;
        const travel = Math.max(0, stickyH - startTop - elH - padBottom);

        // progress with slight speed variation
        const y = Math.min(travel, (pSlow * travel) * (1 / (speed * 1.15)));

        el.style.transform = `translate3d(0, ${y.toFixed(2)}px, 0)`;
      }
    }

    function requestRender() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(render);
    }

    // initial
    measure();
    $cols.removeClass('is-active').first().addClass('is-active');
    requestRender();

    // Use Lenis as source of truth if available
    if (window.__lenis && typeof window.__lenis.on === 'function') {
      window.__lenis.on('scroll', (e) => {
        lastY = (e && typeof e.scroll === 'number') ? e.scroll : (window.scrollY || 0);
        requestRender();
      });
    } else {
      // fallback native
      window.addEventListener('scroll', () => {
        lastY = window.scrollY || 0;
        requestRender();
      }, { passive: true });
    }

    window.addEventListener('resize', () => {
      measure();
      lastY = window.scrollY || 0;
      requestRender();
    });
  })();

  function initContactPage() {
    // Form Toggle Logic
    const $contactBtn = $('#contactBtn');
    const $quoteBtn = $('#quoteBtn');
    const $contactForm = $('#contactForm');
    const $quoteForm = $('#quoteForm');

    $contactBtn.on('click', function () {
      $contactBtn.removeClass('text-slate-400').addClass('bg-cyan-500 text-white shadow-lg shadow-cyan-500/25');
      $quoteBtn.removeClass('bg-cyan-500 text-white shadow-lg').addClass('text-slate-400');
      $quoteForm.addClass('hidden');
      $contactForm.removeClass('hidden').hide().fadeIn(400);
    });

    $quoteBtn.on('click', function () {
      $quoteBtn.removeClass('text-slate-400').addClass('bg-cyan-500 text-white shadow-lg shadow-cyan-500/25');
      $contactBtn.removeClass('bg-cyan-500 text-white shadow-lg').addClass('text-slate-400');
      $contactForm.addClass('hidden');
      $quoteForm.removeClass('hidden').hide().fadeIn(400);
    });

    // Form Input Animations
    $('input, textarea, select').on('focus', function () {
      $(this).parent().addClass('transform scale-[1.02]');
    }).on('blur', function () {
      $(this).parent().removeClass('transform scale-[1.02]');
    });

    // Parallax Effect for Hero (Contact page) — via scroll manager
    addScrollTask('contactHeroFloat', (y) => {
      if (window.matchMedia('(max-width: 640px)').matches) return;

      $('.animate-float-slow').css('transform', `translateY(${y * 0.3}px)`);
      $('.animate-float-slow-reverse').css('transform', `translateY(${y * -0.3}px)`);
    });

    // Auto-open Quote tab if URL has #quote
    function openQuoteTab() {
      $quoteBtn.trigger('click');
    }

    function openContactTab() {
      $contactBtn.trigger('click');
    }

    if (window.location.hash === '#quoteForm') {
      // delay a bit so DOM + AOS layout settles
      setTimeout(openQuoteTab, 50);
    } else {
      setTimeout(openContactTab, 50);
    }

    // If user clicks links that change hash while staying on page
    $(window).on('hashchange', function () {
      if (window.location.hash === '#quoteForm') openQuoteTab();
      else openContactTab();
    });
  }

  (function setActiveNav() {
    const path = window.location.pathname.replace(/\/+$/, '') || '/';

    // Desktop links
    document.querySelectorAll('#headerNav a.jms-navlink2').forEach(a => {
      const href = (a.getAttribute('href') || '').replace(window.location.origin, '').replace(/\/+$/, '');
      if (!href) return;

      // exact match or "startsWith" for sections
      if (href === path || (href !== '/' && path.startsWith(href))) {
        a.classList.add('is-active');
      }
    });

    // Services: if current page is services, set active on button
    const svcBtn = document.getElementById('svcBtn');
    if (svcBtn && (path.startsWith('/services') || path.includes('services'))) {
      svcBtn.classList.add('is-active');
    }
  })();

  (function hideHeroHintOnScroll() {
    const el = document.getElementById('heroScrollHint');
    if (!el) return;

    function update() {
      if ((window.scrollY || 0) > 40) el.classList.add('opacity-0');
      else el.classList.remove('opacity-0');
    }
    window.addEventListener('scroll', update, { passive: true });
    update();
  })();

  // Category Filter Animation
  $('.rounded-full').on('click', function () {
    if ($(this).text() === 'All') {
      $('article').fadeIn(400);
    } else {
      $('article').each(function () {
        const category = $(this).find('.absolute.top-4').text().trim();
        if (category === $(this).text()) {
          $(this).fadeIn(400);
        } else {
          $(this).fadeOut(400);
        }
      });
    }
  });

  // Search Functionality
  $('input[type="text"]').on('keyup', function () {
    const searchTerm = $(this).val().toLowerCase();
    $('article').each(function () {
      const title = $(this).find('h3').text().toLowerCase();
      const excerpt = $(this).find('p').text().toLowerCase();
      if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // Particle Animation
  function createParticle() {
    const particle = document.createElement('div');
    particle.className = 'absolute w-2 h-2 bg-cyan-400/30 rounded-full pointer-events-none';
    particle.style.left = Math.random() * 100 + '%';
    particle.style.top = '100%';
    particle.style.animation = `float-up ${5 + Math.random() * 5}s linear forwards`;
    $('#particles').append(particle);

    setTimeout(() => particle.remove(), 10000);
  }

  setInterval(createParticle, 300);

  // Add float-up animation
  $('<style>')
    .prop('type', 'text/css')
    .html(`
            @keyframes float-up {
                to {
                    transform: translateY(-100vh) rotate(360deg);
                    opacity: 0;
                }
            }
        `)
    .appendTo('head');

  // Category Filter
  $('.cat-pill').on('click', function () {
    const selected = $(this).text().trim();

    // UI active state (optional)
    $('.cat-pill').removeClass('bg-cyan-500 text-white').addClass('bg-white/10 text-slate-300 border border-white/20');
    $(this).addClass('bg-cyan-500 text-white').removeClass('bg-white/10 text-slate-300 border border-white/20');

    if (selected === 'All') {
      $('article').fadeIn(250);
      return;
    }

    $('article').each(function () {
      const cardCat = $(this).find('.absolute.top-4.left-4, .absolute.top-4').first().text().trim();
      if (cardCat === selected || cardCat.replace(/\s+/g, ' ') === selected) {
        $(this).fadeIn(250);
      } else {
        $(this).fadeOut(250);
      }
    });
  });

  function initServicesPage() {
    // Counter Animation
    const $counters = $('.counter');
    let counted = false;

    function animateCounters() {
      $counters.each(function () {
        const $this = $(this);
        const target = parseInt($this.data('target'), 10) || 0;
        const duration = 2000;
        const startTime = performance.now();

        function updateCounter(currentTime) {
          const elapsed = currentTime - startTime;
          const progress = Math.min(elapsed / duration, 1);
          const easeOutQuart = 1 - Math.pow(1 - progress, 4);
          const current = Math.floor(easeOutQuart * target);

          $this.text(current + (target > 100 && progress === 1 ? '+' : ''));

          if (progress < 1) requestAnimationFrame(updateCounter);
        }
        requestAnimationFrame(updateCounter);
      });
    }

    if ($counters.length) {
      const statsSection = $counters.first().closest('section')[0];
      if (statsSection && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting && !counted) {
              counted = true;
              animateCounters();
              io.unobserve(entry.target);
            }
          });
        }, { threshold: 0.5 });

        io.observe(statsSection);
      } else {
        animateCounters();
      }
    }

    // Parallax for hero media
    const $heroVideo = $('#servicesHero video, #servicesHero img');
    removeScrollTask('servicesHeroParallax');

    if ($heroVideo.length) {
      addScrollTask('servicesHeroParallax', (y) => {
        $heroVideo.css('transform', `translateY(${y * 0.4}px) scale(1.1)`);
      });
    }

    console.log('Services Page Loaded');
  }

  function initAboutPage() {
    const counters = document.querySelectorAll('body[data-page="about"] .counter');
    if (!counters.length) return;

    function animateOne(el) {
      if (el.dataset.ran === '1') return;
      el.dataset.ran = '1';

      const target = parseInt(el.dataset.target || '0', 10);
      const duration = 1600;
      const start = performance.now();

      function tick(now) {
        const t = Math.min(1, (now - start) / duration);
        const eased = 1 - Math.pow(1 - t, 4);
        const val = Math.floor(target * eased);

        el.textContent = String(val) + (t === 1 && target > 100 ? '+' : '');

        if (t < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
    }

    function runAll() {
      counters.forEach(animateOne);
    }

    const section = counters[0].closest('section');

    if (section && 'IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          runAll();
          io.disconnect();
        }
      }, { threshold: 0.5 });

      io.observe(section);
    } else {
      runAll();
    }

    const $heroImage = $('body[data-page="about"] .animate-kenburns');
    removeScrollTask('aboutHeroParallax');

    if ($heroImage.length) {
      addScrollTask('aboutHeroParallax', (y) => {
        $heroImage.css('transform', `translateY(${y * 0.5}px) scale(1.1)`);
      });
    }

    console.log('About Page Loaded');
  }

  const page = document.body.dataset.page || '';

  // Remove tasks you don’t want globally
  removeScrollTask('homeServicesParallax');
  removeScrollTask('statsMosaicParallax');
  removeScrollTask('parallaxImgs');
  removeScrollTask('contactHeroFloat');

  if (page === 'home') {
    // Services Parallax Background
    addScrollTask('homeServicesParallax', (y, vh) => {
      const $servicesSection = $('#homeServices');
      if (!$servicesSection.length) return;

      const sectionTop = $servicesSection.offset().top;
      const sectionHeight = $servicesSection.outerHeight();

      if (y + vh > sectionTop && y < sectionTop + sectionHeight) {
        const parallaxSpeed = 0.5;
        const yPos = (y - sectionTop) * parallaxSpeed;
        $('#servicesParallaxBg').css('transform', `translateY(${yPos}px) scale(1.1)`);
      }
    });
    // Stats Mosaic Parallax on Scroll
    addScrollTask('statsMosaicParallax', (y, vh) => {
      $('.stat-card-parallax').each(function () {
        const $card = $(this);
        const cardTop = $card.offset().top;
        const cardHeight = $card.outerHeight();
        const speed = parseFloat($card.data('speed')) || 1;

        if (y + vh > cardTop && y < cardTop + cardHeight) {
          const yPos = (y - cardTop) * 0.1 * speed;
          $card.css('transform', `translateY(${yPos}px)`);
        }
      });
    });
    // Parallax Effect for Images
    addScrollTask('parallaxImgs', (y, vh) => {
      $('.parallax-img').each(function () {
        const $img = $(this);
        const speed = Number($img.data('speed')) || 0.5;
        const rect = this.getBoundingClientRect();

        if (rect.top < vh && rect.bottom > 0) {
          const rate = y * speed;
          $img.css('transform', `translateY(${rate * 0.1}px) scale(1.1)`);
        }
      });
    });
  }

  if (page === 'services') initServicesPage();
  if (page === 'about') initAboutPage();
  if (page === 'contact') initContactPage();


  // ===== Newsletter (AJAX) =====
  function showNewsletterMsg($msgEl, type, text) {
    const icon = (type === 'ok')
      ? '<i class="bi bi-check-circle-fill me-1"></i>'
      : '<i class="bi bi-exclamation-triangle-fill me-1"></i>';

    $msgEl
      .removeClass()
      .addClass('pointer-events-none absolute left-0 right-0 -bottom-6 text-center text-sm')
      .addClass(type === 'ok' ? 'text-emerald-600' : 'text-red-600')
      .html(icon + text)
      .removeClass('hidden');

    clearTimeout($msgEl.data('timer'));
    const t = setTimeout(() => $msgEl.addClass('hidden'), 4000);
    $msgEl.data('timer', t);
  }

  $(document).on('submit', '#newsletterForm, #newsletterFormResources', function (e) {
    e.preventDefault();

    const $form = $(this);
    const $btn = $form.find('button[type="submit"]');

    const isResources = $form.is('#newsletterFormResources');
    const $msg = isResources ? $('#newsletterMsgResources') : $('#newsletterMsg');

    if ($btn.data('busy')) return;
    $btn.data('busy', true).prop('disabled', true);

    showNewsletterMsg($msg, 'ok', 'Submitting...');

    $.ajax({
      url: $form.attr('action'), // uses route('newsletter.store')
      method: 'POST',
      data: $form.serialize(),
      headers: {
        'X-CSRF-TOKEN': $form.find('input[name="_token"]').val()
      }
    })
      .done(function (res) {
        showNewsletterMsg($msg, 'ok', res?.message || 'Subscribed successfully');
        $form[0].reset();
      })
      .fail(function (xhr) {
        const err =
          xhr?.responseJSON?.errors?.email?.[0] ||
          xhr?.responseJSON?.message ||
          'Something went wrong. Try again.';
        showNewsletterMsg($msg, 'err', err);
      })
      .always(function () {
        $btn.data('busy', false).prop('disabled', false);
      });
  });

  // ===== Back To Top =====
  (function initBackToTop() {
    const $btn = $('#backToTopBtn');
    if (!$btn.length) return;

    function setVisible(show) {
      if (show) $btn.removeClass('hidden');
      else $btn.addClass('hidden');
    }

    // show after scroll (adjust number if needed)
    addScrollTask('backToTop', (y) => {
      setVisible(y > 500);
    });

    $(document).on('click', '#backToTopBtn', function (e) {
      e.preventDefault();
      // Use Lenis if present
      if (window.__lenis && typeof window.__lenis.scrollTo === 'function') {
        window.__lenis.scrollTo(0, { duration: 1.1 });
      } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    });
  })();

  $(function () {
    const $hero = $('#jmsHero').length
      ? $('#jmsHero')
      : $('.relative').filter(function () {
        return $(this).hasClass('min-h-[60vh]');
      }).first();

    if (!$hero.length) return;

    const $orbs = $hero.find('.absolute.rounded-full');
    if (!$orbs.length) return;

    $(window).off('scroll.jmsParallax').on('scroll.jmsParallax', function () {
      const scrolled = window.pageYOffset || $(window).scrollTop();
      const rate = scrolled * 0.5;

      $orbs.each(function (index) {
        const speed = (index + 1) * 0.2;
        $(this).css('transform', `translateY(${rate * speed}px)`);
      });
    });
  });

  (function initAjaxLogin() {
    const $form = $('#adminLoginForm');
    if (!$form.length) return;

    const $error = $('#loginError');

    function setLoading(isLoading) {
      const $btn = $form.find('button[type="submit"]');
      const $icon = $btn.find('.btnIcon');
      const $text = $btn.find('.btnText');

      if (isLoading) {
        $btn.prop('disabled', true).addClass('opacity-90 cursor-not-allowed');
        $text.text('Initializing...');
        $icon
          .removeClass('bi-arrow-right-circle group-hover:translate-x-1')
          .addClass('bi-arrow-repeat jms-spin');
      } else {
        $btn.prop('disabled', false).removeClass('opacity-90 cursor-not-allowed');
        $text.text('Initialize Session');
        $icon
          .removeClass('bi-arrow-repeat jms-spin')
          .addClass('bi-arrow-right-circle group-hover:translate-x-1');
      }
    }

    $form.off('submit.ajaxLogin').on('submit.ajaxLogin', function (e) {
      e.preventDefault();

      $error.addClass('hidden').text('');
      setLoading(true);

      $.ajax({
        url: $form.attr('action'),
        method: 'POST',
        data: $form.serialize(),
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
      })
        .done(function () {
          // redirect to admin dashboard
          window.location.href = "/admin/dashboard";
        })
        .fail(function (xhr) {
          // keep panel open + show message
          let msg = "Invalid credentials. Please try again.";

          // Laravel validation / auth message support
          if (xhr.responseJSON) {
            if (xhr.responseJSON.message) msg = xhr.responseJSON.message;
            if (xhr.responseJSON.errors) {
              const firstKey = Object.keys(xhr.responseJSON.errors)[0];
              if (firstKey) msg = xhr.responseJSON.errors[firstKey][0];
            }
          }

          $error.removeClass('hidden').text(msg);
          setLoading(false);
        });
    });
  })();

  (function initMobileAdminLogin() {
    $(document).off('click.mobileAdminLogin').on('click.mobileAdminLogin', '#mobileAdminLoginBtn', function (e) {
      e.preventDefault();
      e.stopPropagation();

      if (typeof window.closeMobileNav === 'function') window.closeMobileNav();

      setTimeout(() => {
        openAccountPanel();
      }, 340);
    });
  })();

  document.addEventListener('click', function (e) {
    const btn = e.target.closest('#mobileAdminLoginBtn');
    if (!btn) return;

    e.preventDefault();
    e.stopPropagation();

    console.log('Mobile Admin Login clicked');

    // close menu if you have it
    if (typeof window.closeMobileNav === 'function') window.closeMobileNav();

    // open panel after menu close animation
    setTimeout(() => {
      window.openAccountPanel();
    }, 350);
  });

  (function initAccountPanel() {
    const $panel = $('#accountPanel');
    if (!$panel.length) return;

    function openPanel() {
      $panel
        .removeClass('opacity-0 invisible translate-y-4 scale-95')
        .addClass('opacity-100 visible translate-y-0 scale-100')
        .css({ display: 'block', pointerEvents: 'auto', zIndex: 99999 });
    }

    function closePanel() {
      $panel
        .addClass('opacity-0 invisible translate-y-4 scale-95')
        .removeClass('opacity-100 visible translate-y-0 scale-100');
    }

    function isOpen() {
      return $panel.hasClass('opacity-100') && !$panel.hasClass('invisible');
    }

    // Desktop trigger
    $(document).off('click.accountTrigger').on('click.accountTrigger', '#accountTrigger', function (e) {
      e.preventDefault();
      e.stopPropagation();
      isOpen() ? closePanel() : openPanel();
    });

    // Mobile Admin Login
    $(document).off('click.mobileAdminLogin').on('click.mobileAdminLogin', '#mobileAdminLoginBtn', function (e) {
      e.preventDefault();
      e.stopPropagation();

      if (typeof window.closeMobileNav === 'function') window.closeMobileNav();

      setTimeout(() => {
        openPanel();
      }, 350);
    });

    // Outside click closes
    $(document).off('click.accountOutside').on('click.accountOutside', function (e) {
      if (!isOpen()) return;
      if ($(e.target).closest('#accountPanel, #accountTrigger, #mobileAdminLoginBtn').length) return;
      closePanel();
    });

    // ESC closes
    $(document).off('keydown.accountEsc').on('keydown.accountEsc', function (e) {
      if (e.key === 'Escape') closePanel();
    });

    // expose if needed
    window.openAccountPanel = openPanel;
    window.closeAccountPanel = closePanel;
  })();


});