@php
$count = count($logos);
@endphp
<div class="{{ $block_classes ?? '' }} py-10">
    <div class="bg-gray-100 text-center py-4 text-gray-700">
        {{ $trusted_by }}
    </div>
    <div class="grid lg:grid-cols-{{ $count }} md:grid-cols-{{ ceil($count/2) }} gap-0">
        @foreach ($logos as $logo)
        <div class="logo-block flex items-center py-10" style="background-color: {{ $logo['logo_background'] }};">
            <img src="{{ $logo['logo_image']['url'] }}" alt="{{ $logo['logo_image']['alt'] }}" class="logo-image object-center object-contain aligncenter h-24">
        </div>
        @endforeach
    </div>
</div>
