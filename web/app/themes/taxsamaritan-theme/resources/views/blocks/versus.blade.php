<div class="{{ $block_classes ?? '' }} md:flex text-white items-center max-w-3xl mb-8">
    <div class="versus-block w-full md:w-2/5">
        <div class="versus-title">{!! App\wrap_last($win_title) !!}</div>
        <ul class="versus-list p-4">
            @foreach ($wins as $win)
            <li><img src="@asset('images/versus-check.png')" alt="Versus Check" class="inline pr-2">{{ $win['win_item'] }}</li>
            @endforeach
        </ul>
    </div>
    <div class="versus-img w-full md:w-1/5 px-3">
        <img src="@asset('images/versus.png')" alt="Versus" class="aligncenter mb-0" />
    </div>
    <div class="versus-block w-full md:w-2/5">
        <div class="versus-title">{!! App\wrap_last($loss_title) !!}</div>
        <ul class="versus-list p-4">
            @foreach ($losses as $loss)
            <li><img src="@asset('images/versus-check.png')" alt="Versus Check" class="inline pr-2">{{ $loss['loss_item'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
