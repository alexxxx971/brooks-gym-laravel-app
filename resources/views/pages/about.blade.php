<x-app-layout>

    {{-- 🦸‍♂️ Hero Section --}}
    <x-hero-section title="ABOUT <span class='text-[#ff7f00]'>US</span>"/>
    {{-- end of 🦸‍♂️ Hero Section --}}

    {{-- 🖼️ About Section Image Grid --}}
    <section class="pt-4 md:pt-6 pb-6 md:pb-8 mt-0 border-t-2 border-[#2d2d2d] relative z-[1]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-[4vmin] w-full">
            <img
                src="{{ asset('assets/images/about-grid-1.jpg') }}"
                alt="About Image 1"
                class="animate-on-scroll w-full h-auto block hover:scale-105 hover:shadow-lg"
                data-animate="animate-card-fade-up"
            >
            <img
                src="{{ asset('assets/images/about-grid-2.jpg') }}"
                alt="About Image 2"
                class="animate-on-scroll w-full h-auto block hover:scale-105 hover:shadow-lg"
                data-animate="animate-card-fade-up"
            >
            <img
                src="{{ asset('assets/images/about-grid-3.jpg') }}"
                alt="About Image 3"
                class="animate-on-scroll w-full h-auto block hover:scale-105 hover:shadow-lg"
                data-animate="animate-card-fade-up"
            >
        </div>
    </section>



    {{-- 💡 Philosophy Section --}}
    <section class="relative z-[1] border-y-2 border-[#ff7f00]">

        {{-- 🔲 Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center brightness-[.5]"
             style="background-image: url('{{ asset('assets/images/about-philosophy-background.jpg') }}');">
        </div>

        {{-- ⬛ Overlay for Better Readability --}}
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        {{-- 📦 Content Container --}}
        <x-section-title-block
            :title-lines="['VITALITY,', 'STRENGTH &', 'UNITY']"
            paragraph="At Brooks Gym, our philosophy is rooted in creating a fitness journey that emphasizes functional strength,
adaptability, and holistic well-being. Guided by Jannie and Adri Brooks, we champion innovative weightlifting,
dynamic movement training, and personalized programs tailored to individual goals.

We strive to foster resilience, build confidence, and cultivate a balanced, health-centered lifestyle in a supportive community."
        />

    </section>
    {{-- end of 💡 Philosophy Section --}}

    {{-- ✅ Details Sections: Culture, Mission, Facility, Coaches --}}
    @php
        $aboutSections = [
            [
                'title' => 'Culture',
                'image' => 'about-us-our-culture.jpg',
                'alt' => 'Culture Image',
                'desc' => 'Our culture is built on inclusivity, support, and a shared passion for fitness. We believe in fostering a community where everyone feels welcome and motivated to achieve their personal best.'
            ],
            [
                'title' => 'Mission',
                'image' => 'about-us-our-mission.jpg',
                'alt' => 'Mission Image',
                'desc' => 'Our mission is to empower individuals through fitness, providing the tools and support needed to lead a healthy, balanced lifestyle. We are dedicated to helping our members achieve their goals.'
            ],
            [
                'title' => 'Facility',
                'image' => 'about-us-facility.jpg',
                'alt' => 'Facility Image',
                'desc' => 'Our state-of-the-art facility is equipped with the latest fitness technology and amenities. We offer a variety of spaces designed to cater to all fitness levels and preferences.'
            ],
            [
                'title' => 'Coaches',
                'image' => 'about-us-our-specialists.jpg',
                'alt' => 'Coaches Image',
                'desc' => 'Our team of experienced coaches is dedicated to providing personalized guidance and support. They are passionate about helping you reach your fitness goals and maintain a healthy lifestyle.',
                'button' => [
                    'label' => 'The Team',
                    'route' => route('specialists')
                ]
            ]
        ];
    @endphp

    <section class="grid grid-cols-1 md:grid-cols-2 gap-x-[4vmin] gap-y-[4vmin] p-[2.5vmin] max-w-[1400px] mx-auto z-[1]">
        @foreach ($aboutSections as $section)
            <div
                id="{{ Str::slug($section['title']) }}" {{-- 🆔 This enables anchor linking! --}}
            class="card-group opacity-0 relative overflow-hidden border border-[#565355] hover:-translate-y-1.5 hover:shadow-xl"
            >
                <img
                    src="{{ asset('assets/images/' . $section['image']) }}"
                    alt="{{ $section['alt'] }}"
                    class="w-full h-[60vh] md:h-[520px] object-cover object-center block"
                />

                <h3 class="text-white uppercase font-[Nexaonnit,sans-serif] italic font-black text-[36px] leading-[1.1] mt-[3vmin] ml-[2vmin]">
                    {{ $section['title'] }}
                </h3>

                <p class="text-[#c5c5c5] text-[15px] font-inter font-light leading-[1.7] tracking-[-0.25px] max-w-[440px] ml-[2vmin] mt-[1.5vmin] mb-6">
                    {{ $section['desc'] }}
                </p>

                @if(isset($section['button']))
                    <a href="{{ $section['button']['route'] }}" class="btn-outline-white ml-[15px] mb-4">
                        {{ $section['button']['label'] }}
                    </a>
                @endif
            </div>
        @endforeach
    </section>
    {{-- end of ✅ Details Sections --}}

</x-app-layout>
