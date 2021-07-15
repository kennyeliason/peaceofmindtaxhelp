<div class="{{ $block_classes ?? '' }} flex items-center grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-12 max-w-6xl w-full mb-12">
    @foreach ($squares as $square)
    <div class="growing-square bg-white p-4">
        <img src="{{ $square['square_icon']['url'] }}" alt="{{ $square['square_icon']['alt'] }}" class="square-icon aligncenter w-24 h-24 object-contain" />
        <h3 class="square-heading uppercase text-center text-brand-600 text-lg has-text-color">{!! App\wrap_last($square['square_heading'], '<span class="text-trim-500">','</span>') !!}</h3>
        <div class="square-text text-sm text-center text-gray-900 has-text-color">{{ $square['square_text'] }}</div>
    </div>
    @endforeach
</div>
