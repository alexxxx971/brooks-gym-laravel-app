{{-- 📂 File: resources/views/partials/training-heading.blade.php --}}
@props(['gray', 'white', 'orange'])

<h2 class="font-nexa-display text-2xl sm:text-4xl md:text-5xl leading-tight tracking-wide text-left space-y-1 mb-6">
    <span class="block text-gray-400">{{ $gray }}</span>
    <span class="block text-white">{{ $white }}</span>
    <span class="block text-orange-500">{{ $orange }}</span>
</h2>
