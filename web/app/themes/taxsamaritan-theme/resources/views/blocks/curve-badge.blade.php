@if ($curve_image)
<div class="{{ $block_classes ?? ''}} {{ $curve_position }} relative h-16">
    <img src="{{ $curve_image['url'] }}" alt="{{ $curve_image['alt'] }}" class="mx-auto absolute" />
</div>
@endif
