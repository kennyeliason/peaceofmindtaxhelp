{{-- @dd($animated_image) --}}
<div class="{{ $block_classes }}">
    <div class="relative pb-20">
        <img src="{{ $stable_image['sizes']['large'] }}" alt="{{ $stable_image['alt'] }}" class="object-cover w-3/4 h-full -z-10 border-4 border-white" loading="lazy"/>
        <img src="{{ $animated_image['sizes']['large'] }}" alt="{{ $animated_image['alt'] }}" class="absolute right-0 bottom-0 object-cover w-40 h-40 border-4 border-white" loading="lazy"/>
    </div>
</div>
