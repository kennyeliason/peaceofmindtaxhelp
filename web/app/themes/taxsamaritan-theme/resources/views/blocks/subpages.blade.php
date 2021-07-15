@if($subpages)
<div class="{{ $block_classes }} alignwide bg-trim-500 border-4 border-white rounded shadow p-8 max-w-4xl">
    @if($intro_text)
    <h2 class="text-center text-white">{{ $intro_text }}</h2>
    @endif
    <ul class="list-none inline-block text-center pl-0 pb-2">
        @foreach($subpages as $subpage)
        <li class="inline-block text-white font-heading md:whitespace-no-wrap py-2 px-4 border-b border-white"><a href="{{ get_permalink($subpage->ID) }}" class="text-white" title="{{ $subpage->post_title }}"><img src="@asset('images/versus-check.png')" alt="Versus Check" class="inline pr-2">{{ $subpage->post_title }}</a></li>
        @endforeach
    </ul>
</div>
@endif
