document.addEventListener("DOMContentLoaded", () => {
  // === Elements ===
  const elements = {
    header: document.querySelector(".site-header-wrapper"),
    drawer: document.querySelector(".drawer"),
    menuToggle: document.querySelector(".menu-toggle"),
    logo: document.querySelector(".site-logo img"),
  };
  const animations = {
    // Subtle movement of menu items when drawer opens
    drawerOpen() {
      if (typeof gsap === "undefined") return;

      gsap.set(".drawer .menu-item", { y: 60, opacity: 0 });

      gsap.to(".drawer .menu-item", {
        y: 0,
        opacity: 1,
        stagger: 0.08,
        duration: 0.7,
        ease: "power3.out",
      });
    },

    drawerClose() {
      if (typeof gsap === "undefined") return;

      gsap.to(".drawer .menu-item", {
        y: -20,
        opacity: 0,
        duration: 0.3,
        ease: "power2.inOut",
      });
    },

    // Scroll-based scale animation for team cards (only ≥768px)
    teamCards() {
      if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
        return;

      gsap.registerPlugin(ScrollTrigger);

      if (window.innerWidth > 768) {
        gsap.fromTo(
          ".team .card",
          { scale: 0.9 },
          {
            scale: 1,
            scrollTrigger: {
              trigger: ".team-wrapper",
              start: "top 70%",
              end: "bottom 100%",
              scrub: true,
            },
            ease: "none",
          }
        );
      }
    },
  };

  // === Drawer Menu ===
  const drawer = {
    open() {
      elements.drawer.classList.add("is-open");
      elements.logo.classList.add("dark");
      document.body.classList.add("no-scroll");
      elements.menuToggle.classList.add("on");
      animations.drawerOpen(); // Trigger GSAP here
    },
    close() {
      elements.drawer.classList.remove("is-open");
      elements.logo.classList.remove("dark");
      document.body.classList.remove("no-scroll");
      elements.menuToggle.classList.remove("on");
      animations.drawerClose(); // Trigger GSAP here
    },
    toggle() {
      const isOpen = elements.drawer.classList.toggle("is-open");
      const isDark = elements.logo.classList.toggle("dark");
      document.body.classList.toggle("no-scroll");
      elements.menuToggle.classList.toggle("on");
      isOpen || isDark ? animations.drawerOpen() : animations.drawerClose();
    },
    lockHeader() {
      if (window.scrollY > 200) {
        elements.logo.style.maxWidth = "12rem";
        elements.header.classList.add("scrolled");
      } else {
        elements.logo.style.maxWidth = "";
        elements.header.classList.remove("scrolled");
      }
    },
  };

  // === Back to Top Button ===
  const backToTop = document.querySelector("#back-to-top");

  // Toggle visibility based on scroll depth
  const toggleBackToTop = () => {
    if (window.scrollY > window.innerHeight * 0.4) {
      backToTop.classList.add("visible");
    } else {
      backToTop.classList.remove("visible");
    }
  };

  // Smooth scroll to top
  const scrollUp = () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  };

  // Event Listeners
  if (backToTop) {
    window.addEventListener("scroll", toggleBackToTop);

    backToTop.addEventListener("click", (e) => {
      e.preventDefault();
      scrollUp();
    });
  }

  // === Active Menu Item ===
  const highlightActiveMenu = () => {
    const currentUrl = window.location.href;
    document.querySelectorAll("#primary-menu li a").forEach((item) => {
      if (item.href === currentUrl) item.classList.add("active");
    });
  };

  // === Debounce ===
  const debounce = (callback, wait) => {
    let timeout;
    return (...args) => {
      clearTimeout(timeout);
      timeout = setTimeout(() => callback.apply(this, args), wait);
    };
  };

  // === Event Listeners ===
  const addEventListeners = () => {
    if (elements.menuToggle && elements.drawer) {
      elements.menuToggle.addEventListener("click", drawer.toggle);
    }
    window.addEventListener("scroll", debounce(drawer.lockHeader, 50));
  };

  // === Initialize ===
  const init = () => {
    addEventListeners();
    highlightActiveMenu();
    animations.teamCards(); // triggers scroll-based card animation
  };

  init();

  // === Splide Cards ===
  const splide = new Splide(".cards", {
    perPage: 4,
    rewind: true,
    gap: "0rem",
    arrows: true,
    pagination: false,
    breakpoints: {
      2560: {
        perPage: 5,
      },
      1512: {
        perPage: 4,
      },
      1024: {
        perPage: 3,
      },
      768: {
        perPage: 3,
      },
      600: {
        perPage: 2,
      },
      500: {
        perPage: 1,
      },
    },
  });

  // Custom SVG
  const customArrow = `
    <svg version="1.1" id="fi_664866" xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 512.009 512.009">
      <path d="M508.625,247.801L508.625,247.801L392.262,131.437c-4.18-4.881-11.526-5.45-16.407-1.269
        c-4.881,4.18-5.45,11.526-1.269,16.407c0.39,0.455,0.814,0.88,1.269,1.269l96.465,96.582H11.636C5.21,244.426,0,249.636,0,256.063
        s5.21,11.636,11.636,11.636H472.32l-96.465,96.465c-4.881,4.18-5.45,11.526-1.269,16.407s11.526,5.45,16.407,1.269
        c0.455-0.39,0.88-0.814,1.269-1.269l116.364-116.364C513.137,259.67,513.137,252.34,508.625,247.801z"></path>
    </svg>
  `;

  // Helper function to apply arrows
  function updateArrows() {
    const prev = document.querySelector(".splide__arrow--prev");
    const next = document.querySelector(".splide__arrow--next");
    if (!prev || !next) return;

    next.innerHTML = customArrow;
    prev.innerHTML = customArrow;

    prev.querySelector("svg").style.transform = "rotate(180deg)";
  }

  // Apply on mount
  splide.on("mounted", updateArrows);

  // Apply on breakpoint changes / rebuild
  splide.on("updated", updateArrows);

  // Some themes rebuild arrows on resize — safe to include
  splide.on("resize", updateArrows);

  splide.mount();
});
