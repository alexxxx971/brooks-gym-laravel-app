{{-- 📦 File: components/training-carousel.blade.php --}}
<section
        class="min-h-screen relative flex flex-col md:flex-row items-start md:items-center justify-center gap-y-12 md:gap-x-0 w-full
           px-2 sm:px-4 pt-24 sm:pt-36 pb-16 sm:pb-24 z-[1] border-t-2 border-[#ff7f00]"
        data-cy="carousel-section"
>
    {{-- 🔲 Background Image --}}
    <x-logo-bg />
    {{-- 🔲 end of Background Image --}}

    <div
            x-data="{
        current: 0,
        currentVideo: 0,
        videos: {{ Js::from($videos) }},
        paragraphs: {{ Js::from($paragraphs) }},
        icons: {{ Js::from($icons) }},
        isMobile: window.innerWidth < 768,

        next() {
            this.current = (this.current + 1) % this.paragraphs.length;

            if (!this.isMobile) {
                this.currentVideo = (this.currentVideo + 1) % this.videos.length;
            }
        },
        prev() {
            this.current = (this.current - 1 + this.paragraphs.length) % this.paragraphs.length;

            if (!this.isMobile) {
                this.currentVideo = (this.currentVideo - 1 + this.videos.length) % this.videos.length;
            }
        }
    }"
            x-init="window.addEventListener('resize', () => {
        isMobile = window.innerWidth < 768;
    })"
            class="flex flex-col md:flex-row md:items-center justify-center gap-0 w-full relative"
    >

        {{-- 📝 Text Column --}}
        <div class="w-full md:w-[28%] px-2 z-10 animate-fadeInUp text-center md:text-left flex flex-col items-center md:items-start">


            {{-- 🔶 Accent Line --}}
            <div class="h-[2px] w-16 bg-orange-500 mb-4"></div>

            {{-- 🔤 Heading --}}
            <div id="mst-heading" data-animate="animate-slide-in-left"
                 class="animate-on-scroll w-full flex flex-col-reverse items-center md:items-start text-center md:text-left">
                {!! $heading !!}
            </div>

            {{-- 📝 Subheading --}}
            <h3 class="text-white font-semibold text-base sm:text-lg mt-4 mb-2"
                x-text="paragraphs[current].heading"
                data-cy="carousel-subheading"></h3>

            {{-- 📜 Paragraph --}}
            <p id="mst-paragraph" data-animate="animate-slide-in-right"
               data-cy="carousel-paragraph"
               class="leading-[1.75rem] animate-on-scroll opacity-0 font-poppins text-base sm:text-lg md:text-[1.125rem] leading-relaxed text-gray-300 font-light max-w-[90vw] sm:max-w-[80vw] md:max-w-[500px]"
               x-html="paragraphs[current].body"></p>

            {{-- 🚀 CTA --}}
            <div class="mt-6">
                <a :href="'{{ $buttonLink }}'" class="btn-outline-white" data-cy="cta-btn">
                    Get Started
                </a>
            </div>

            {{-- ⬅️➡️ Arrows --}}
            <div class="flex items-center justify-center gap-4 mt-6">
                <button
                        @click="prev();"
                        class="bg-orange-500 hover:bg-orange-600 text-white text-xl w-10 h-10 rounded-full shadow-lg transition"
                        data-cy="carousel-prev"
                >
                    &#10094;
                </button>
                <button
                        @click="next();"
                        class="bg-orange-500 hover:bg-orange-600 text-white text-xl w-10 h-10 rounded-full shadow-lg transition"
                        data-cy="carousel-next"
                >
                    &#10095;
                </button>
            </div>
        </div>

        {{-- 🧭 Stepper Middle Column --}}
        <div class="hidden md:flex flex-col items-center justify-start z-10 px-2 md:px-0">
            <div class="vertical-stepper m-0 p-0">
                <template x-for="(icon, index) in icons" :key="index">
                    <div
                            :class="current === index ? 'step is-active' : 'step'"
                            :data-cy="'step-' + index"
                            @click="
                    current = index;
                    currentVideo = index;
                "
                    >
                <span class="step-icon">
                    <i :class="icon"></i>
                </span>
                    </div>
                </template>
            </div>
        </div>


        {{-- 🎥 Video Column --}}
        <div class="w-full md:w-[46%] p-1 z-10 flex justify-center animate-fadeInUp">
            <div class="relative w-full max-w-[500px] p-1 rounded-lg shadow-lg overflow-visible">
                <template x-for="(vid, index) in videos" :key="index">
                    <div
                            x-show="currentVideo === index"
                            :data-cy="'carousel-slide-' + index"
                            class="transition-all duration-500 flex flex-col items-center text-center px-2"
                    >
                        <p class="text-xs sm:text-sm text-gray-300 italic mb-2"
                           :data-cy="'carousel-label-' + index"
                           x-text="vid.label"></p>

                        <div class="w-full max-w-[420px] sm:max-w-[480px] md:max-w-[500px]">
                            <video
                                    x-ref="carouselVideo"
                                    :src="vid.src"
                                    autoplay
                                    muted
                                    loop
                                    playsinline
                                    controls
                                    class="w-full h-auto rounded-md object-contain max-h-[400px] sm:max-h-[500px] md:max-h-full transition-all duration-700"
                                    :class="currentVideo === index ? 'animate-flip-in-video' : ''"
                                    :data-cy="'carousel-video-' + index"
                            />
                        </div>
                    </div>
                </template>            </div>
        </div>

        {{-- 📱 Stepper for Mobile --}}
        <div class="flex md:hidden justify-center mt-8">
            <div class="flex gap-4">
                <template x-for="(icon, index) in icons" :key="index">
                    <button
                            class="w-10 h-10 rounded-full flex items-center justify-center text-white transition"
                            :class="current === index ? 'bg-orange-500' : 'bg-gray-500'"
                            @click="
                    current = index;
                    currentVideo = index;
                "
                            :data-cy="'step-mobile-' + index"
                    >
                        <i :class="icon"></i>
                    </button>
                </template>
            </div>
        </div>



    </div>
</section>
