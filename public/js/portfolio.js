// * Theme toggle + scroll reveal
(function () {
  const root = document.documentElement;
  const btn = document.getElementById('themeToggle');
  if (btn) {
    btn.addEventListener('click', function () {
      const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
      root.dataset.theme = next;
      localStorage.setItem('theme', next);
    });
  }

  const io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) { if (e.isIntersecting) e.target.classList.add('in'); });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
})();


// * Desktop Navigation Toggle
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".nav-links a");

    window.addEventListener("scroll", () => {
        let current = "";
        const scrollY = window.pageYOffset;
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;

        // Special check: If user scrolled to the very bottom, force the last section (Contact)
        if ((scrollY + windowHeight) >= (documentHeight - 20)) {
            if (sections.length > 0) {
                current = sections[sections.length - 1].getAttribute("id");
            }
        } else {
            sections.forEach(section => {
                const sectionHeight = section.offsetHeight;
                const sectionTop = section.offsetTop - 120; // Navbar offset
                const sectionId = section.getAttribute("id");

                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    current = sectionId;
                }
            });
        }

        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href") === `#${current}`) {
                link.classList.add("active");
            }
        });
    });
});

// * Mobile Navigation Toggle
document.addEventListener("DOMContentLoaded", function () {
    const mobileBtn = document.getElementById("mobileMenuBtn");
    const mobileDropdown = document.getElementById("mobileDropdown");
    const mobileLinks = document.querySelectorAll(".mobile-link");

    if (mobileBtn && mobileDropdown) {
        mobileBtn.addEventListener("click", () => {
            mobileDropdown.classList.toggle("open");
        });

        // Close menu when clicking any nav link
        mobileLinks.forEach(link => {
            link.addEventListener("click", () => {
                mobileDropdown.classList.remove("open");
            });
        });

        // Close menu when clicking outside
        document.addEventListener("click", (e) => {
            if (!mobileBtn.contains(e.target) && !mobileDropdown.contains(e.target)) {
                mobileDropdown.classList.remove("open");
            }
        });
    }
});
