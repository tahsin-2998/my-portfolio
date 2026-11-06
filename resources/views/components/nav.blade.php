{{-- * nav bar --}}
<nav class="nav">
    <div class="container nav-inner">
        <a href="#top" class="logo">tah<span class="accent">sin</span></a>

        {{-- * Desktop Links --}}
        <div class="nav-links">
            <a href="#services">Services</a><a href="#work">Work</a><a href="#about">About</a>
            <a href="#journey">Journey</a><a href="#habits">Beyond Code</a><a href="#contact">Contact</a>
        </div>

        <div class="nav-actions">
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme"><span class="moon">☾</span><span
                    class="sun">☀</span></button>
            <a href="#contact" class="btn btn-accent btn-sm d-none d-md-inline-flex">Hire me →</a>

            {{-- * Mobile Menu Hamburger Button --}}
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    {{-- * Mobile Dropdown Drawer --}}
    <div class="mobile-dropdown" id="mobileDropdown">
        <a href="#services" class="mobile-link">Services</a>
        <a href="#work" class="mobile-link">Work</a>
        <a href="#about" class="mobile-link">About</a>
        <a href="#journey" class="mobile-link">Journey</a>
        <a href="#habits" class="mobile-link">Beyond Code</a>
        <a href="#contact" class="mobile-link">Contact</a>
        <a href="#contact" class="btn btn-accent" style="width: 100%; justify-content: center; margin-top: 1rem;">Hire
            me →</a>
    </div>
</nav>
