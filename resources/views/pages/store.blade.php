{{-- 📂 File: resources/views/pages/store.blade.php --}}
{{-- 🎯 Purpose: Brooks Gym Store - Two-column layout with Contact Us card beside Coming Soon list --}}

<x-app-layout>
    {{-- 🧠 Hero Section --}}
    <x-hero-section title="BROOKS <span class='text-[#ff7f00]'>GYM</span> STORE" />

    {{-- 🚧 Store Section --}}
    <section class="relative bg-gradient-to-b from-black via-gray-900 to-black py-20 px-6 sm:px-10 border-y-2 border-[#ff7f00] overflow-hidden">

        <div class="relative max-w-7xl mx-auto fade-in-section">

            {{-- 🧠 Section Header --}}
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center p-2 bg-orange-500/10 rounded-full mb-6">
                    <svg class="h-8 w-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-wide">
                    Your Fitness <span class="text-[#ff7f00]">Destination</span> Coming Soon
                </h2>
                <p class="text-lg text-gray-300 mx-auto max-w-2xl leading-relaxed font-medium">
                    Our online store is currently under construction. We're working hard to bring you top-quality fitness gear, supplements, and merchandise that matches the Brooks Gym standard of excellence!
                </p>
            </div>

            {{-- 🔲 Grid with 2 Columns: Coming Soon + Contact --}}
            <div class="grid md:grid-cols-2 gap-12 bg-gray-900 border-2 border-[#ff7f00] rounded-2xl p-6 md:p-12 shadow-2xl">

                {{-- ✅ Left Column: Coming Soon Items --}}
                <div class="flex flex-col">
                    <h4 class="text-xl font-bold text-[#ff7f00] mb-6 flex items-center gap-2 tracking-wide">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Coming Soon
                    </h4>
                    <div class="space-y-5 flex-1">
                        @foreach([
                            ['Premium Workout Gear', 'Professional-grade equipment and accessories'],
                            ['Nutritional Supplements', 'High-quality supplements for optimal performance'],
                            ['Brooks Gym Merchandise', 'Exclusive branded apparel and accessories'],
                            ['Training Accessories', 'Everything you need to maximize your workouts'],
                        ] as [$title, $desc])
                            <div class="flex items-start gap-3 p-4 bg-gray-800 hover:bg-gray-700 rounded-lg border border-gray-600 hover:border-orange-400 shadow-sm hover:shadow-md transition duration-300 w-full">
                                <div class="w-2 h-2 bg-orange-500 rounded-full mt-2"></div>
                                <div>
                                    <h5 class="text-white font-semibold text-base">{{ $title }}</h5>
                                    <p class="text-gray-400 text-sm font-medium">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- 📬 Right Column: Contact Us Card --}}
                <div class="flex flex-col justify-center">
                    {{-- Contact Card --}}
                    <div class="bg-gray-800 border border-[#ff7f00] rounded-2xl p-6 shadow-lg">
                        <h3 class="text-2xl font-bold text-white mb-4">📬 Have a Question?</h3>
                        <p class="text-gray-400 mb-6 leading-relaxed">
                            We're happy to help! Reach out to us for any inquiries about gear, supplements, or gym info.
                        </p>
                        <a href="{{ route('contact') }}"
                           class="inline-block bg-[#ff7f00] text-white font-semibold text-base px-6 py-3 rounded-lg shadow-md hover:bg-orange-600 transition duration-200 ease-in-out leading-none">
                            Contact Us
                        </a>

                    </div>
                </div>
            </div>

            {{-- 🔙 Back to Home --}}
            <div class="pt-10 mt-16 border-t border-gray-700 text-center">
                <a href="{{ route('welcome') }}"
                   class="inline-flex items-center gap-2 text-orange-400 border border-orange-400 px-4 py-2 rounded-md group mt-6 transition-all duration-300 hover:bg-orange-500 hover:text-white hover:shadow-lg">
                    <svg class="h-4 w-4 transform transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Home
                </a>
            </div>

        </div>
    </section>

    {{-- ✨ Animation --}}
    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-in-section {
            opacity: 0;
            animation: fade-in 0.6s ease-out 0.1s forwards;
        }
    </style>
</x-app-layout>
