{{-- 📦 File: components/training-gallery.blade.php --}}
@props(['slides'])

<section class="bg-[#121212] py-16 border-t-2 border-orange-500" data-cy="gallery-section">
    <div x-data="{ current: 0, slides: @js($slides) }" class="relative max-w-7xl mx-auto px-6">

        {{-- 🌄 Slide Content --}}
        <div class="relative">
            <div
                class="grid grid-cols-1 md:grid-cols-[1.2fr_auto_1.2fr] gap-12 items-center transition-all duration-500 ease-in-out"
                x-transition:enter="transition-opacity duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                data-cy="gallery-slide"
            >

                {{-- 🖼️ Image --}}
                <div>
                    <img
                        :src="'{{ asset('') }}' + slides[current].image"
                        :alt="slides[current].alt"
                        data-cy="gallery-img"
                        class="training-gallery-img shadow-xl w-full max-h-[500px] sm:max-h-[600px] md:max-h-[650px] object-contain transition-all duration-300 cursor-pointer rounded-md"
                    />
                </div>

                {{-- 📏 Divider --}}
                <div class="hidden md:block h-[300px] w-[3px] bg-gray-600 mx-auto rounded"></div>

                {{-- 📝 Text Content --}}
                <div class="text-white space-y-6 pl-0 md:pl-6" data-cy="gallery-content">
                    <h3 id="gallery-heading" data-cy="gallery-heading" class="font-nexa-display text-3xl sm:text-4xl md:text-5xl leading-tight tracking-wide text-left">
                        <span class="text-gray-400" x-text="slides[current].heading_gray"></span>
                        <span class="text-white" x-text="slides[current].heading_white"></span>
                        <span class="text-orange-500" x-text="slides[current].heading_orange"></span>
                    </h3>

                    <p id="gallery-paragraph" class="text-gray-300 text-base sm:text-lg leading-relaxed" x-text="slides[current].paragraph" data-cy="gallery-paragraph"></p>

                    <p class="text-gray-400 italic text-sm">
                        <span x-text="slides[current].quote ? `“${slides[current].quote}”` : ''"></span>
                        — <strong x-text="slides[current].author" data-cy="gallery-author"></strong>
                    </p>
                </div>
            </div>

            {{-- 🖥️ Desktop Arrows --}}
            <button
                class="hidden md:flex absolute -left-16 top-1/2 -translate-y-1/2 carousel-btn bg-orange-500 rounded-full p-4"
                @click="current = (current === 0) ? slides.length - 1 : current - 1"
                aria-label="Previous Slide"
                title="Previous"
                data-cy="gallery-prev-desktop"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button
                class="hidden md:flex absolute -right-12 top-1/2 -translate-y-1/2 carousel-btn bg-orange-500 rounded-full p-4"
                @click="current = (current === slides.length - 1) ? 0 : current + 1"
                aria-label="Next Slide"
                title="Next"
                data-cy="gallery-next-desktop"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            {{-- 📱 Mobile Arrows --}}
            <div class="flex justify-center gap-6 my-6 md:hidden" data-cy="gallery-mobile-nav">
                <button
                    @click="current = (current === 0) ? slides.length - 1 : current - 1"
                    class="bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow transition"
                    aria-label="Previous Slide"
                    title="Previous"
                    data-cy="gallery-prev"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button
                    @click="current = (current === slides.length - 1) ? 0 : current + 1"
                    class="bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow transition"
                    aria-label="Next Slide"
                    title="Next"
                    data-cy="gallery-next"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- ⏺️ Slide Indicators --}}
        @verbatim
            <div class="mt-8 flex justify-center gap-4" data-cy="gallery-indicators">
                <template x-for="(slide, index) in slides" :key="index">
                    <button
                        class="w-3 h-3 rounded-full transition"
                        :class="index === current ? 'bg-orange-500' : 'bg-gray-500'"
                        @click="current = index"
                        :title="`Go to slide ${index + 1}`"
                        :data-cy="`gallery-indicator-${index}`"
                    ></button>
                </template>
            </div>
        @endverbatim
    </div>
</section>
