<picture class="h-16 w-auto">
    <source srcset="{{ asset('images/darkmode-logo.webp') }}" media="(prefers-color-scheme: dark)">
    <img src="{{ asset('images/lightmode-logo.webp') }}" alt="Redump Logo" {{ $attributes->merge(['class' => '!h-16 !w-auto']) }} />
</picture>
