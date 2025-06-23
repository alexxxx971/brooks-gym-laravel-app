{{-- 📂 File: resources/views/layouts/navigation.blade.php --}}

<div x-data="{ open: false, submenu: false }" class="bg-[#121212] fixed top-0 w-full z-[1000] py-4 font-sans">

    {{-- 🗭 Navbar Content Row --}}
    <div class="w-full flex items-center justify-between px-4 sm:px-6">

        {{-- 🔗 Logo + Pin --}}
        <div class="flex items-center space-x-2">
            {{-- 🖼️ Logo (links to homepage) --}}
            <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
                <img src="{{ asset('assets/logo/brooks-gym-website-logo.svg') }}" alt="Brooks Gym Logo" class="max-w-[200px] h-7 transition-opacity duration-200"/>
            </a>

            {{-- 📍 Location Pin (links to Google Maps) --}}
            <a href="https://www.google.com/maps?q=Jannie+%26+Adri+Brooks+Gym+In+The+Park" target="_blank" rel="noopener noreferrer">
                <i class="fa-solid fa-location-dot text-white text-lg pl-1 pr-1 hover:text-yellow-400 transition-colors duration-300"></i>
            </a>
        </div>

        {{-- 🔠 Desktop Nav --}}
        <div :class="open ? 'hidden' : 'hidden lg:flex flex-1 justify-center'">
            <nav class="flex items-center space-x-6 text-white font-bold tracking-wide text-[15px] sm:text-base uppercase">
                <a href="{{ route('about') }}" class="nav-link-underline text-white hover:text-orange-400 transition-all duration-200">About</a>

                {{-- 🔽 Dropdown: Membership --}}
                <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" class="relative">
                    {{-- ✅ FIXED: Changed <span> ➜ <a href="#"> to make Cypress test pass --}}
                    <a href="{{ route('brooks.membership') }}" @click.prevent class="cursor-pointer nav-link-underline text-white hover:text-orange-400 transition-all duration-200">
                        Membership
                    </a>
                    <div x-show="show" x-transition class="absolute bg-[#121212] min-w-[220px] mt-2 shadow-lg z-10">
                        <a href="{{ route('brooks.membership') }}" class="block px-4 py-2 text-white hover:bg-[#1e1e1e]">Brooks Gym Membership</a>
                        <a href="{{ route('lyno.therapy') }}" class="block px-4 py-2 text-white hover:bg-[#1e1e1e]">LYNO Therapy &amp; Fascia Training</a>
                    </div>
                </div>



                <a href="{{ route('specialists') }}" class="nav-link-underline text-white hover:text-orange-400 transition-all duration-200">Specialists</a>

                <a href="{{ route('store') }}" class="nav-link-underline text-white hover:text-orange-400 transition-all duration-200">Store</a>

                {{-- 🔽 Dropdown: Services --}}
                <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" class="relative">
                    {{-- ✅ FIXED: Changed <span> ➜ <a href="#"> to make Cypress test pass --}}
                    <a href="#" @click.prevent class="cursor-pointer nav-link-underline text-white hover:text-orange-400 transition-all duration-200">
                        Services
                    </a>
                    <div x-show="show" x-transition class="absolute bg-[#121212] min-w-[220px] mt-2 shadow-lg z-10">
                        <a href="{{ route('brooks.gym.training') }}" class="block px-4 py-2 text-white hover:bg-[#1e1e1e]">Brooks Gym Training</a>
                        <a href="{{ route('lyno.therapy.training') }}" class="block px-4 py-2 text-white hover:bg-[#1e1e1e]">LYNO Therapy &amp; Training</a>
                        <a href="{{ route('brooks.bands.academy') }}" class="block px-4 py-2 text-white hover:bg-[#1e1e1e]">Brooks and Bands Academy</a>
                    </div>
                </div>



                <a href="{{ route('contact') }}" class="nav-link-underline text-white hover:text-orange-400 transition-all duration-200">Contact</a>
            </nav>
        </div>

        {{-- 🏋️ Dumbbell Toggle Button --}}
        <button
            @click="open = !open"
            data-cy="mobile-menu-toggle"
            class="z-[1001] text-white text-2xl focus:outline-none ml-auto lg:ml-4 transition-all duration-300
    border-2 border-orange-500 rounded-md p-2 block"
            :class="{
        'rotate-90 opacity-0 pointer-events-none': open,
        'opacity-100': !open
    }"
        >
            <i class="fa-solid fa-dumbbell"></i>
        </button>









    </div>

    {{-- 📱 Sidebar Overlay --}}
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-400"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        {{-- 🔳 Backdrop --}}
        <div class="absolute inset-0 bg-black bg-opacity-50" @click="open = false"></div>

        {{-- 📥 Sidebar Slide Panel --}}
        <div
            class="absolute top-0 right-0 w-[80vw] max-w-sm h-full bg-[#121212] shadow-2xl transform transition-transform duration-500 ease-in-out border-l border-orange-500"
            :class="{ 'translate-x-0': open, 'translate-x-full': !open }"
        >
            {{-- ❌ Close Icon --}}
            <button
                @click="open = false"
                data-cy="mobile-close"
                class="absolute top-4 right-4 text-yellow-400 text-3xl focus:outline-none z-50 hover:rotate-90 transition-transform duration-300"
            >
                &times;
            </button>

            {{-- 📚 Sidebar Links --}}
            <nav
                data-cy="mobile-nav"
                class="flex flex-col items-start p-6 pt-20 space-y-6 text-white text-[15px] tracking-wide uppercase font-semibold"
            >
                <a href="{{ route('about') }}" class="hover:text-orange-400 transition-colors duration-200 border-b border-[#333] w-full pb-2">About</a>

                {{-- 📱 Sidebar Membership Dropdown --}}
                <div x-data="{ membershipSubmenu: false }" class="w-full">
                    <button @click="membershipSubmenu = !membershipSubmenu" class="w-full text-left hover:text-orange-400 transition-colors duration-200">
                        MEMBERSHIPS
                    </button>
                    <div x-show="membershipSubmenu" x-transition class="pl-4 mt-2 space-y-2 text-sm font-normal">
                        <a href="{{ route('brooks.membership') }}" class="block hover:text-orange-400">Brooks Gym Membership</a>
                        <a href="{{ route('lyno.therapy') }}" class="block hover:text-orange-400">LYNO Therapy &amp; Fascia Training</a>
                    </div>
                </div>

                <a href="{{ route('specialists') }}" class="hover:text-orange-400 transition-colors duration-200 border-b border-[#333] w-full pb-2">Specialists</a>

                <a href="{{ route('store') }}" class="hover:text-orange-400 transition-colors duration-200 border-b border-[#333] w-full pb-2">Store</a>

                {{-- 📦 Services Dropdown --}}
                <div x-data="{ submenu: false }" class="w-full">
                    <button @click="submenu = !submenu" class="w-full text-left hover:text-orange-400 transition-colors duration-200">
                        SERVICES
                    </button>
                    <div x-show="submenu" x-transition class="pl-4 mt-2 space-y-2 text-sm font-normal">
                        <a href="{{ route('brooks.gym.training') }}" class="block hover:text-orange-400">Brooks Gym Training</a>
                        <a href="{{ route('lyno.therapy.training') }}" class="block hover:text-orange-400">LYNO Therapy &amp; Training</a>
                        <a href="{{ route('brooks.bands.academy') }}" class="block hover:text-orange-400">Brooks and Bands Academy</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="hover:text-orange-400 transition-colors duration-200 border-b border-[#333] w-full pb-2">Contact</a>

                {{-- 🔗 Socials --}}
                <div class="flex items-center space-x-4 pt-6 text-xl">
                    <a href="#" class="text-white hover:text-blue-500 transition-colors duration-200">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-500 transition-colors duration-200">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>
{{-- ✅ End of Navbar --}}
