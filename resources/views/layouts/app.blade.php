{{-- =============================================================================
  🧠 Head & Meta Setup
============================================================================ --}}
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- 🔐 CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        use App\Helpers\SeoHelper;
        $slug = request()->path() ?: 'homepage'; // fallback to homepage
        $seo = SeoHelper::fetchSeoMeta($slug);
    @endphp

    {{-- ✅ SEO Title + Description --}}
    <title>{{ $seo['title'] ?? config('app.name', 'Brooks Gym') }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Functional fitness, strength training, and expert coaching in Pretoria.' }}">

    {{-- ✅ Canonical Tag (SEO boost) --}}
    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @else
        {{-- Default fallback to current URL --}}
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    {{-- ✅ Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    {{-- ✅ Google reCAPTCHA --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    {{-- ✅ Tailwind CSS & JS --}}
    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-76Xd9Q5Z.css') }}">
        <script src="{{ asset('build/assets/app-Ck23l56J.js') }}" defer></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- ✅ Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- ✅ Favicon --}}
    <link rel="apple-touch-icon" href="{{ asset('assets/logo/brooksgym-official-logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/brooksgym-official-logo.png') }}">
</head>

{{-- ================================end of 🧠 Head & Meta Setup section============================================ --}}


{{-- =============================================================================
  🌍 Body Layout & Global Styling
============================================================================ --}}
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] font-sans">
<div class="min-h-screen">

    {{-- =============================================================================
      🚀 Navbar (Logo, Navigation, Social Icons)
    ============================================================================= --}}
    @include('layouts.navigation')
    {{-- ================================end of 🚀 Navbar section============================================ --}}


    {{-- =============================================================================
      🎯 Main Content Layout
    ============================================================================= --}}
    <main>
        {{ $slot }}
    </main>
    {{-- ================================end of 🎯 Main Content Layout section============================================ --}}


    {{-- =============================================================================
      📦 Footer
    ============================================================================= --}}
     @include('layouts.footer')
    {{-- ================================end of 📦 Footer section============================================ --}}

</div>



{{-- =============================================================================
  📜 Scroll Fade-In Script (Image Animation)
============================================================================ --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fadeTargets = document.querySelectorAll('img, .philosophy-animate');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-[50px]');
                }
            });
        }, { threshold: 0.1 });

        fadeTargets.forEach(el => observer.observe(el));
    });
</script>

{{-- ================================end of 📜 Scroll Fade-In Script============================================ --}}

</body>
{{-- ================================end of 🌍 Body Layout & Global Styling section============================================ --}}
</html>
{{-- ================================end of 🔚 Closing Tags section============================================ --}}
