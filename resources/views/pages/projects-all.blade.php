@extends('layouts.app')

@section('title', 'All Projects — ' . $p['name'])

@section('content')
    {{-- * nav bar --}}
    <nav class="nav">
        <div class="container nav-inner">
            <a href="#top" class="logo">tah<span class="accent">sin</span></a>

            {{-- Desktop Links --}}
            <div class="nav-links">
                <a href="#services">Services</a><a href="#work">Work</a><a href="#about">About</a>
                <a href="#journey">Journey</a><a href="#habits">Beyond Code</a><a href="#contact">Contact</a>
            </div>

            <div class="nav-actions">
                <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme"><span class="moon">☾</span><span
                        class="sun">☀</span></button>
                <a href="#contact" class="btn btn-accent btn-sm d-none d-md-inline-flex">Hire me →</a>

                {{-- Mobile Menu Hamburger Button --}}
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

    <section class="section" style="min-height: 85vh;">
        <div class="container">
            <p class="eyebrow">Archive</p>
            <h2 class="section-title">All Projects</h2>

            <div class="grid-3">
                @forelse ($projects as $pr)
                    <article class="project reveal" style="height: 100%;">
                        <div class="project-cover {{ $pr->cover ?? 'cover-1' }}"
                            style="aspect-ratio: 16/9; font-size: 1.5rem;">{{ $pr->title }}</div>
                        <div class="project-body d-flex flex-column" style="height: 100%;">
                            <div class="tags">
                                @php
                                    $tags = is_array($pr->tags) ? $pr->tags : json_decode($pr->tags, true) ?? [];
                                @endphp
                                @foreach ($tags as $t)
                                    <span class="tag {{ $loop->first ? 'hot' : '' }}">{{ $t }}</span>
                                @endforeach
                            </div>
                            <h3>{{ $pr->title }}</h3>
                            <p class="muted" style="flex-grow: 1;">{{ $pr->text ?? $pr->description }}</p>
                            <a href="{{ $pr->github_url ?? '#contact' }}" target="_blank" rel="noopener" class="link-arrow"
                                style="margin-top: 1rem;">View Code on GitHub →</a>
                        </div>
                    </article>
                @empty
                    <div class="col-12 py-5 text-center">
                        <p class="muted">No projects found in the database.</p>
                    </div>
                @endforelse
            </div>

            <div style="margin-top: 3rem; text-align: center;">
                <a href="{{ route('home') }}" class="btn btn-ghost">← Back to Home</a>
            </div>
        </div>
    </section>

    {{-- * Footer section --}}
    <footer class="footer">
        <div class="container">
            <span>© {{ date('Y') }} {{ $p['name'] }}. All rights reserved.</span>
            <span>Built with Laravel · Dhaka, Bangladesh</span>
        </div>
    </footer>
@endsection
