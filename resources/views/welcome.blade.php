{{-- =============================================================================
  🧠 Head & Meta Setup
============================================================================ --}}

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark overflow-x-hidden">

{{-- 📂 File: resources/views/layouts/head.blade.php OR inside @section('head') --}}
<!-- 📂 welcome.blade.php -->
<!-- 🎯 Optimized <head> with Laravel + Rank Math SEO integration -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta name="theme-color" content="#121212" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{-- 🧠 SEO Meta from WordPress Rank Math --}}
    @php
        use App\Helpers\SeoHelper;
        $slug = request()->is('/') ? 'homepage' : request()->path();
        $seo = SeoHelper::fetchSeoMeta($slug);
    @endphp

    <title>{{ $seo['title'] ?? config('app.name', 'Brooks Gym') }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Functional fitness, strength training, and expert coaching in Pretoria.' }}">
    <meta name="keywords" content="{{ $seo['focus_keyword'] ?? 'Functional Fitness, Pretoria, Gym, Brooks' }}">

    {{-- ✅ Open Graph / Social Meta (Optional) --}}
    <meta property="og:title" content="{{ $seo['title'] ?? 'Brooks Gym' }}">
    <meta property="og:description" content="{{ $seo['description'] ?? 'Functional fitness, strength training, and expert coaching in Pretoria.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- ✅ Favicon & Touch Icon --}}
    <link rel="apple-touch-icon" href="{{ asset('assets/logo/brooksgym-official-logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/brooksgym-official-logo.png') }}">

    {{-- ✅ Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- ✅ Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    {{-- ✅ Preload Background --}}
    <link rel="preload" as="image" href="{{ asset('assets/images/background-audience.jpg') }}">

    {{-- ✅ CSS & JS (Vite or Static) --}}
    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-76Xd9Q5Z.css') }}">
        <script src="{{ asset('build/assets/app-Ck23l56J.js') }}" defer></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- ✅ Alpine + reCAPTCHA --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

{{-- ================================end of 🧠 Head & Meta Setup section============================================ --}}


{{-- =============================================================================
  🌍 Body Layout & Global Styling
============================================================================ --}}

<body class="overflow-x-hidden bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] font-sans">


{{-- =============================================================================
  🚀 Navbar (Logo, Navigation, Social Icons)
============================================================================ --}}



{{--navbar--}}
@include('layouts.navigation')
{{--  End of Navbar --}}



{{-- ================================end of 🚀 Navbar section============================================ --}}


{{-- =============================================================================
  🎯 Main Content Layout
============================================================================ --}}


{{-- 🎯 Hero Section --}}
<section
    id="hero-section"
    class="relative w-full min-h-screen flex items-center justify-center overflow-hidden transition-opacity duration-700 opacity-100"
>

    {{-- 🎞 Background Slider --}}
    <div class="absolute inset-0 w-full h-full z-[1] pointer-events-none">
        @foreach ([
            'hero-image-slider (1).jpg',
            'hero-image-slider (2).jpg',
            'hero-image-slider (3).jpg',
            'hero-image-slider (4).jpg',
            'hero-image-slider (5).jpg',
            'hero-image-slider (6).jpg',
        ] as $slide)
            <div
                class="slide absolute inset-0 bg-cover bg-bottom transition-opacity duration-1000 ease-in-out opacity-0"
                style="background-image: url('{{ asset('assets/images/' . $slide) }}');"
            >
                <div class="absolute inset-0 bg-black bg-opacity-70 z-[1] pointer-events-none"></div>
            </div>
        @endforeach
    </div>

    {{-- 💬 Hero Content --}}
    <div
        class="relative z-20 px-6 sm:px-10 md:px-16 lg:px-24 pb-16 sm:pb-20 md:pb-24 max-w-screen-xl w-full flex flex-col items-start text-left"
    >

        {{-- 🎯 Heading with Embedded Logo (Left-Aligned) --}}
        <h1 class="font-nexa-display mt-8 sm:mt-12 md:mt-16 max-w-[90vw] sm:max-w-[75vw] md:max-w-[20ch] text-left">

            {{-- 🔥 Logo (will animate via JS) --}}
            <div id="hero-logo" class="w-[140px] sm:w-[160px] md:w-[200px] mb-4">
                <img
                    src="{{ asset('assets/logo/brooksgym-official-logo.png') }}"
                    alt="Brooks Gym Logo"
                    class="w-full h-auto"
                >
            </div>

            {{-- 🧠 Slogan Lines (animation applied via JS) --}}
            <span class="block text-gray-400">NO</span>
            <span class="block text-gray-400">LIMITS</span>
            <span class="block text-white">JUST</span>
            <span class="block text-orange-500">RESULTS</span>
        </h1>

        {{-- 📝 Description (will animate via JS only) --}}
        <p
            id="hero-description"
            class="opacity-0 font-poppins text-gray-300 text-base sm:text-lg md:text-xl mt-4 max-w-[600px]"
        >
            Push harder, move stronger, and reach new heights with functional fitness tailored to your potential.
        </p>

        {{-- 🔘 CTA Button (wrapper will animate via JS) --}}
        <div class="mt-2">
            <a href="{{ route('contact') }}" class="btn-outline-white">Get Started</a>
        </div>
    </div>
</section>
{{-- 🎯 Hero Section End --}}





{{--📘 About Gym Section --}}
<section class="relative flex flex-col md:flex-row items-center justify-between px-4 pt-36 pb-16 sm:pt-44 sm:pb-20 sm:px-8 md:px-12 lg:px-20 overflow-visible z-[1]">

    {{-- 🔳 Background Faint Logo --}}
    <x-logo-bg/>

    {{-- 🎥 Left: Video --}}
    <div
        id="about-video"
        class="w-full md:w-1/2 p-4 z-10 flex justify-center opacity-0 translate-y-8 transition-all duration-700"
    >
        {{-- 🎞️ Video Container --}}
        <div class="relative rounded-lg overflow-hidden shadow-lg p-2 w-full max-w-[500px]">
            {{-- 🎬 Video Element --}}
            <video
                src="{{ asset('assets/videos/about-us-brooksgym.mp4') }}"
                controls
                autoplay
                muted
                class="w-full h-auto rounded-md"
            ></video>

            {{-- 🌀 Replay Swirl (Centered Middle) --}}
            <button
                id="replay-btn"
                class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 transition hover:scale-110 z-50"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 fill-orange-500 hover:fill-orange-600 transition duration-300" viewBox="0 0 24 24">
                    <path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z"/>
                </svg>
            </button>
        </div>
    </div>





    {{-- 📝 Right: Text --}}
    <div class="w-full md:w-1/2 p-4 z-10 animate-fadeInUp text-center md:text-left flex flex-col items-center md:items-start">

        {{-- 🎯 Accent Line --}}
        <div class="h-[2px] w-16 sm:w-20 md:w-24 bg-orange-500 my-4 md:ml-0"></div>

        {{-- ✅ Updated h2 alignment --}}
        <h2 id="welcome-about-heading"
            class="font-nexa-display text-2xl sm:text-4xl md:text-5xl leading-tight tracking-wide
           text-center md:text-left mb-6
           max-w-[90vw] sm:max-w-[80vw] md:max-w-[30ch] opacity-0">
            <span class="block text-gray-400">Empowering Strength</span>
            <span class="block text-white">and Wellness with</span>
            <span class="block text-orange-500">Athleticism and Performance</span>
        </h2>


        {{-- 📜 Paragraph --}}
        <p
            id="welcome-about-paragraph"
            class="opacity-0 font-poppins text-sm sm:text-base md:text-lg leading-relaxed text-gray-300 font-light max-w-[90vw] sm:max-w-[80vw] md:max-w-[500px]">
            At Brooks Gym, we redefine fitness with functional, high-intensity, and community-driven workouts.
            Our philosophy is rooted in personalized coaching, constant variety, and a science-based approach to training.
            <br><br>
            We specialize in bodyweight exercises, unique weightlifting styles, and movement-based training that boost
            endurance, power, and adaptability. Dynamic, workout sessions are designed to foster camaraderie, motivation,
            and incredible results.
            <br><br>
            Join us outdoors for a health-centered lifestyle where fitness is a journey toward strength, resilience,
            and vibrant living.
        </p>

        {{-- 🔘 CTA: About Us --}}
        <div class="mt-6">
            <a href="{{ route('about') }}" class="btn-outline-white">
                About Us
            </a>
        </div>

    </div>

</section>
{{--📘 End of About Gym Section --}}



{{-- 🎯 Audience Fit Section --}}
<div
    id="audience-bg"
    class="bg-hidden-state flex justify-center items-center border-t border-[#e65c00] bg-[position:0_0,0_0,50%] bg-repeat bg-[length:auto,auto,cover] transition-all duration-1000 ease-in-out"
    style="background-image: radial-gradient(circle, #000, #0000), linear-gradient(#101010b3, #101010b3), url('{{ asset('assets/images/background-audience.jpg') }}');"
>
    <section class="w-full max-w-7xl px-4 sm:px-6 md:px-12 lg:px-16 py-24 sm:py-28 relative z-20">

        {{-- 🧠 Section Heading --}}
        <div id="audience-heading" class="mb-12 text-center md:text-left opacity-0 transition-all duration-500">
            <div class="h-[2px] w-16 sm:w-20 md:w-24 bg-orange-500 my-4 md:ml-0 mx-auto md:mx-0"></div>
            <h2 class="font-nexa-display text-2xl sm:text-4xl md:text-5xl leading-tight tracking-wide text-left mb-6">
                <span class="text-gray-400">DESIGNED FOR </span>
                <span class="text-white">DIVERSE </span>
                <span class="text-orange-500">FITNESS NEEDS</span>
            </h2>
        </div>

        {{-- 🧱 Responsive Grid Cards (Staggered Animation on Scroll or Reload) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-center mt-12">

            {{-- 🔶 Card 1 --}}
            <div class="card-group opacity-0 max-w-[440px] mt-12 lg:mt-16 rounded-lg overflow-hidden text-white transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="w-full h-[480px] sm:h-[520px] lg:h-[540px] min-h-[400px] overflow-hidden">
                    <img loading="lazy" src="{{ asset('assets/images/audience-1.jpg') }}" alt="Everyday People"
                         class="w-full h-full object-top object-contain sm:object-cover rounded-md shadow-md">
                </div>
                <div class="pt-5">
                    <h3 class="text-white text-lg sm:text-xl md:text-2xl font-extrabold italic uppercase mb-2">
                        <i class="fa-solid fa-person-running text-orange-500 mr-2"></i>
                        Everyday People
                    </h3>
                    <p class="font-poppins text-[#c5c5c5] text-sm sm:text-base leading-relaxed">
                        Designed for individuals looking to improve overall fitness and health, our programs combine
                        bodyweight exercises with functional strength training using a variety of weight training
                        techniques. Each workout is safe, effective, and time-efficient.
                    </p>
                </div>
            </div>

            {{-- 🔶 Card 2 --}}
            <div class="card-group opacity-0 max-w-[440px] mt-6 lg:mt-8 rounded-lg overflow-hidden text-white transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="w-full h-[480px] sm:h-[520px] lg:h-[540px] min-h-[400px] overflow-hidden">
                    <img loading="lazy" src="{{ asset('assets/images/audience-2.jpg') }}" alt="Fitness Enthusiasts"
                         class="w-full h-full object-top object-contain sm:object-cover rounded-md shadow-md">
                </div>
                <div class="pt-5">
                    <h3 class="text-white text-lg sm:text-xl md:text-2xl font-extrabold italic uppercase mb-2">
                        <img loading="lazy" src="{{ asset('assets/icons/kettlebell.png') }}"
                             alt="Kettlebell Icon"
                             class="kettlebell-icon" />
                        Fitness Enthusiasts
                    </h3>
                    <p class="font-poppins text-[#c5c5c5] text-sm sm:text-base leading-relaxed">
                        Perfect for those passionate about fitness and seeking a more advanced approach. Our
                        high-intensity programs enhance power, endurance, and performance through dynamic and
                        challenging workouts.
                    </p>
                </div>
            </div>

            {{-- 🔶 Card 3 --}}
            <div class="card-group opacity-0 max-w-[440px] mt-0 lg:mt-4 rounded-lg overflow-hidden text-white transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="w-full h-[480px] sm:h-[520px] lg:h-[540px] min-h-[400px] overflow-hidden">
                    <img loading="lazy" src="{{ asset('assets/images/audience-3.jpg') }}" alt="Athletes"
                         class="w-full h-full object-top object-contain sm:object-cover rounded-md shadow-md">
                </div>
                <div class="pt-5">
                    <h3 class="text-white text-lg sm:text-xl md:text-2xl font-extrabold italic uppercase mb-2">
                        <i class="fa-solid fa-medal text-orange-500 mr-2"></i>
                        Athletes
                    </h3>
                    <p class="font-poppins text-[#c5c5c5] text-sm sm:text-base leading-relaxed">
                        Tailored for athletes and weekend warriors alike, our functional training programs enhance
                        strength, adaptability, and athletic performance. Each program is customized to your sport,
                        skill level, and personal goals.
                    </p>
                </div>
            </div>

        </div>
    </section>
</div>
{{-- ✅ End of Audience Fit Section --}}







{{-- ================================end of 🎯 Main Content Layout section============================================ --}}



{{-- 📦 Footer --}}
@include('layouts.footer')
{{--end of footer--}}

{{-- =============================================================================
  SCRIPTS
============================================================================ --}}


{{-- Alpine.js --}}
<script src="https://unpkg.com/alpinejs" defer></script>
{{--end of Alpine.js--}}



{{-- 🎞 js for  Background Slider in  Hero Section --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        if (slides.length > 0) {
            slides[currentSlide].classList.add('opacity-100');

            setInterval(() => {
                slides[currentSlide].classList.remove('opacity-100');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('opacity-100');
            }, 5000); // Every 5 seconds
        }
    });
</script>
{{--end of js for  Background Slider in  Hero Section--}}

{{-- ================================end of SCRIPTS============================================ --}}


</body>
{{-- ================================end of 🌍 Body Layout & Global Styling section============================================ --}}

</html>

{{-- ================================end of 🔚 Closing Tags section============================================ --}}
