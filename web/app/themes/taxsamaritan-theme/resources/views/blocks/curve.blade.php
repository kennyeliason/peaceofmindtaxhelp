@php
$curveDirection = get_field('curve_direction');
$mainColor = get_field('main_color');
$secondaryColor = get_field('secondary_color');
$borderColor = get_field('border_color');
@endphp
<div class="{{ $block_classes ?? 'footer-curve'}} alignfull relative w-full h-16 bg-{{ $mainColor ?? 'brand-700' }} overflow-hidden">
    <div class="curve absolute {{ $curveDirection ?? 'bottom' }}-0 h-48 inline-block bg-white">
    </div>
    <div class="curve absolute {{ $curveDirection ?? 'bottom' }}-0 h-48 inline-block bg-{{ $secondaryColor ?? 'white' }} border-8 border-{{ $borderColor ?? 'trim-600' }} {{ $curveDirection === 'top' ? 'mt' : 'mb' }}-2">
    </div>
</div>
