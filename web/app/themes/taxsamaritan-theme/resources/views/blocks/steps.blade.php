<div class="{{ $block_classes }}">
    @foreach ($steps as $step)
    <div class="single-step relative mb-6 z-10 relative inline-block">
        <div class="icon-text flex items-center absolute">
            <img src="{{ $step['step_icon']['url'] }}" alt="{{ $step['step_icon']['alt'] }}" class="icon bg-trim-600 p-4 border-4 border-white h-20 w-20 md:h-32 md:w-32 p-4 object-contain object-center" />
            <h3 class="title bg-radial-brandbrand p-4 text-sm md:text-2xl inline-block w-auto uppercase text-white">
                {{ $step['step_title'] }}
            </h3>
        </div>
        <div class="text inline-block border border-gray-500 bg-gray-300 text-gray-800 px-4 md:px-8 pt-12 pb-4 md:pb-8 font-thin w-11/12 mt-12 md:mt-16">
            {!! $step['step_text'] !!}
        </div>
    </div>
    @endforeach
</div>
