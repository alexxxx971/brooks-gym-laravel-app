{{-- 📦 Reusable Section Title + Paragraph Component --}}
@props([
    'titleLines' => [], // e.g. ['GRAY', 'WHITE', 'ORANGE']
    'paragraph' => null, // optional string
])

<div class="relative flex flex-col items-center justify-center p-[4vmin]">
    <div class="w-full max-w-[1200px] overflow-hidden shadow-md px-[2vmin] py-[2vmin]">
        <div class="text-center space-y-6">

            {{-- 🧠 Section Title (Staggered Span Animation) --}}
            <h2
                class="animate-on-scroll coach-heading opacity-0 font-[Nexaonnit,sans-serif] italic font-black uppercase leading-tight text-center tracking-tight
        text-[clamp(2rem,6vw,3.75rem)] sm:text-[clamp(2.5rem,7vw,4.25rem)] md:text-[clamp(3rem,8vw,5rem)]
        max-w-[90vw] sm:max-w-[80vw] md:max-w-[700px] mx-auto"
                data-animate="animate-fade-up-slow"
            >
                @if(isset($titleLines[0])) <span class="block text-gray-400">{{ $titleLines[0] }}</span> @endif
                @if(isset($titleLines[1])) <span class="block text-white">{{ $titleLines[1] }}</span> @endif
                @if(isset($titleLines[2])) <span class="block text-orange-500">{{ $titleLines[2] }}</span> @endif
            </h2>


            {{-- 📜 Paragraph (fade-up animation) OR fallback to slot --}}
            @if($paragraph)
                <p
                    id="about-paragraph"
                    class="animate-on-scroll opacity-0 font-poppins text-sm sm:text-base md:text-lg leading-relaxed text-gray-200 font-light max-w-[90vw] sm:max-w-[80vw] md:max-w-[700px] mx-auto"
                    data-animate="animate-fade-up"
                >
                    {!! nl2br(e($paragraph)) !!}
                </p>
            @else
                <div class="animate-on-scroll opacity-0 space-y-4" data-animate="animate-fade-up">
                    {{ $slot }}
                </div>
            @endif


        </div>
    </div>
</div>
