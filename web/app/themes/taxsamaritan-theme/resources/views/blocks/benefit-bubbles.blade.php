@if ($bubbles)
<div class="{{ $block_classes ?? ''}}">
    <ul class="bubbles-ul p-0">
        @foreach ($bubbles as $bubble)
        <li class="text-left flex items-xs-center mb-4">
            <div class="bubble-img w-1/3 sm:w-auto">
                <img class="bg-radial-brandbrand object-none object-center w-24 h-24 rounded-full border-white border-4 mx-auto" src="{{ $bubble['bubble_icon']['url'] }}" alt="{{ $bubble['bubble_icon']['alt'] }}" />
            </div>
            <div class="bubble-text uppercase font-heading h-auto align-middle text-white text-lg ml-4 w-2/3 sm:w-auto">
                {{ $bubble['bubble_text'] }}
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
