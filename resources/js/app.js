import './bootstrap';
import Lenis from 'lenis';
import $ from 'jquery';
window.$ = window.jQuery = $;

const lenis = new Lenis({
  duration: 1.6,
  smoothWheel: true,
  smoothTouch: false,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

$(function () {
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

  // header hide/show
  const $header = $("#siteHeader");
  if (!$header.length) return;

  let lastY = window.scrollY || 0;

  $(window).off("scroll.jmsHeader").on("scroll.jmsHeader", function () {
    const y = window.scrollY || 0;
    const goingDown = y > lastY;
    const goingUp = y < lastY;

    if (y <= 10) {
      $header.removeClass("-translate-y-full").addClass("translate-y-0");
      lastY = y;
      return;
    }

    if (goingDown && y > 80) {
      $header.addClass("-translate-y-full").removeClass("translate-y-0");
    }

    if (goingUp && (lastY - y) > 5) {
      $header.removeClass("-translate-y-full").addClass("translate-y-0");
    }

    lastY = y;
  });

  // Mobile icon toggle (list <-> x)
  $("#navBtn").off("click.jmsNav").on("click.jmsNav", function () {
    $("#mobileNav").toggleClass("hidden");
    $("#navIcon").toggleClass("bi-list bi-x-lg");
  });

  // HERO slider
  (function initHeroSlider() {
    const $hero = $("#jmsHero");
    if (!$hero.length) return;

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
          v.play().catch(() => { });
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
    $dots.off("click.jmsHeroDot").on("click.jmsHeroDot", function () {
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
    if (!$root.length || !$btn.length || !$panel.length || !$overlay.length) return;

    const $items = $root.find(".svc-item[data-pane]");
    const $panes = $root.find(".svc-pane[data-pane]");

    const OPEN_DELAY = 120;
    const CLOSE_DELAY = 450;
    let tOpen = null;
    let tClose = null;

    const COMPACT_W = 320;
    const EXPANDED_MAX = 980;
    const PAD = 24;
    const GAP_Y = 14;

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
      const COMPACT_W = 320;
      const EXPANDED_MAX = 980;

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
        $overlay.removeClass("hidden");

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
        $overlay.addClass("hidden");
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

});