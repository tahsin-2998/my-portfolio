@extends('layouts.app')

@section('title', $p['name'] . ' — Laravel Developer & CSE Aspirant')

@section('content')

    <header>
        {{-- nav bar --}}
        @include('components.nav')
    </header>

    {{-- Top section --}}
    <header class="hero" id="top">
        <div class="container hero-grid">
            <div>
                <p class="eyebrow">Open to dev work &amp; internships</p>
                <h1>Hi, I'm <span class="accent">{{ $p['short'] }}</span></h1> {{-- Here $p is coming from the PortfolioController.php file that is sending data from the config/portfolio.php file. --}}
                <p class="hero-lead"><strong>{{ $p['role'] }}</strong> from {{ $p['location'] }}. I build web apps with
                    Laravel &amp; Vue.js — and I'm working toward a CSE degree abroad.</p>
                <div class="hero-ctas">
                    <a href="#work" class="btn btn-dark">View my work ↓</a>
                    <a href="#contact" class="btn btn-ghost">Get in touch</a>
                </div>
                <div class="stats">
                    @foreach ($p['stats'] as $s)
                        <div class="stat"><b>{{ $s['value'] }}</b><span>{{ $s['label'] }}</span></div>
                    @endforeach
                </div>
            </div>
            <div class="hero-photo">
                <img src="{{ asset('images/tahsin.jpg') }}" alt="{{ $p['name'] }}" loading="lazy">
                <span class="badge-open">Open to projects</span>
            </div>
        </div>
    </header>

    {{-- Services Section --}}
    <section class="section alt" id="services">
        <div class="container">
            <p class="eyebrow">What I do</p>
            <h2 class="section-title">Services</h2>
            <div class="grid-2">
                @foreach ($p['services'] as $s)
                    <div class="card reveal">
                        <div class="icon">{{ $s['icon'] }}</div>
                        <h3>{{ $s['title'] }}</h3>
                        <p class="muted">{{ $s['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Selected Work Section --}}
    <section class="section" id="work">
        <div class="container">
            <p class="eyebrow">Portfolio</p>
            <h2 class="section-title">Selected work</h2>
            <div class="work-grid">
                {{-- Column 1: First Project (Big & Tall Layout) --}}
                <div class="work-col">
                    @if ($databaseProjects->isNotEmpty())
                        @php $pr = $databaseProjects->first(); @endphp
                        <article class="project reveal big">
                            <div class="project-cover {{ $pr->cover ?? 'cover-1' }}">{{ $pr->title }}</div>
                            <div class="project-body">
                                <div class="tags">
                                    @php
                                        $techs = is_array($pr->technologies)
                                            ? $pr->technologies
                                            : json_decode($pr->technologies, true) ?? [];
                                    @endphp
                                    @foreach ($techs as $t)
                                        <span class="tag {{ $loop->first ? 'hot' : '' }}">{{ $t }}</span>
                                    @endforeach
                                </div>
                                <h3>{{ $pr->title }}</h3>
                                <p>{{ $pr->description }}</p>
                                <a href="{{ $pr->github_url ?? '#contact' }}" target="_blank" rel="noopener"
                                    class="link-arrow">View Code on GitHub →</a>
                            </div>
                        </article>
                    @endif
                </div>

                {{-- Column 2: Remaining Projects Stacked --}}
                <div class="work-col">
                    @foreach ($databaseProjects->skip(1) as $pr)
                        <article class="project reveal">
                            <div class="project-cover {{ $pr->cover ?? 'cover-2' }}">{{ $pr->title }}</div>
                            <div class="project-body">
                                <div class="tags">
                                    @php
                                        $techs = is_array($pr->technologies)
                                            ? $pr->technologies
                                            : json_decode($pr->technologies, true) ?? [];
                                    @endphp
                                    @foreach ($techs as $t)
                                        <span class="tag {{ $loop->first ? 'hot' : '' }}">{{ $t }}</span>
                                    @endforeach
                                </div>
                                <h3>{{ $pr->title }}</h3>
                                <p>{{ $pr->description }}</p>
                                <a href="{{ $pr->github_url ?? '#contact' }}" target="_blank" rel="noopener"
                                    class="link-arrow">View Code on GitHub →</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <!-- See All My Projects Button -->
            <div class="reveal" style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('project') }}" class="btn btn-dark" style="padding: 0.8rem 1.8rem; font-size: 1rem;">
                    See All My Projects →
                </a>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section class="section alt" id="about">
        <div class="container about-grid">
            <div class="about-photo reveal"><img src="{{ asset('images/tahsin.jpg') }}" alt="{{ $p['name'] }}"
                    loading="lazy"></div>
            <div class="reveal">
                <p class="eyebrow">About me</p>
                <h2 class="section-title" style="margin-bottom:1.2rem">A bit about<br>who I am</h2>
                @foreach ($p['about'] as $para)
                    <p>{{ $para }}</p>
                @endforeach
                <p class="chips-label">My toolkit</p>
                <div class="chips">
                    @foreach ($p['stack'] as $s)
                        <span class="chip">{{ $s }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- My Journey Section --}}
    <section class="section" id="journey">
        <div class="container">
            <p class="eyebrow">Education &amp; training</p>
            <h2 class="section-title">My journey</h2>
            <div class="grid-3">
                @foreach ($p['journey'] as $j)
                    <div class="card timeline-card reveal">
                        <span class="when">{{ $j['when'] }}</span>
                        <h3>{{ $j['title'] }}</h3>
                        <span class="where">{{ $j['where'] }}</span>
                        <p class="muted">{{ $j['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Beyond Code Section --}}
    <section class="section alt" id="habits">
        <div class="container">
            <p class="eyebrow">Beyond code</p>
            <h2 class="section-title">How I work &amp; grow</h2>
            <div class="grid-3">
                @foreach ($p['habits'] as $h)
                    <div class="card habit reveal">
                        <span class="emoji">{{ $h['emoji'] }}</span>
                        <h3>{{ $h['title'] }}</h3>
                        <ul>
                            @foreach ($h['items'] as $it)
                                <li>{{ $it }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="section" id="contact">
        <div class="container">
            <div class="contact-box reveal">
                <div>
                    <p class="eyebrow">Get in touch</p>
                    <h2>Let's work<br>together</h2>
                    <p class="lead">Open to Laravel Web Development work &amp; WordPress Maintenance.</p>
                    <ul class="contact-list">
                        <li><span class="ci">✉</span><a href="mailto:{{ $p['email'] }}">{{ $p['email'] }}</a>
                        </li>
                        <li><span class="ci">☏</span><a
                                href="https://wa.me/{{ ltrim($p['phone'], '+') }}">{{ $p['phone'] }} (WhatsApp)</a>
                        </li>
                        <li><span class="ci">in</span><a href="{{ $p['linkedin'] }}" target="_blank"
                                rel="noopener">LinkedIn</a></li>
                        <li><span class="ci">G</span><a href="{{ $p['github'] }}" target="_blank"
                                rel="noopener">GitHub</a></li>
                    </ul>
                </div>
                <form class="form" method="POST" action="{{ route('contact') }}">
                    @csrf
                    @if (session('success'))
                        <div class="alert">{{ session('success') }}</div>
                    @endif
                    <div class="form-row">
                        <div>
                            <label for="name">Name</label>
                            <input id="name" name="name" value="{{ old('name') }}" required
                                placeholder="Your name">
                            @error('name')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="you@example.com">
                            @error('email')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="subject">Subject</label>
                        <input id="subject" name="subject" value="{{ old('subject') }}"
                            placeholder="Project inquiry">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-accent" type="submit">Send message →</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        {{-- footer --}}
        @include('components.footer')
    </footer>

@endsection
