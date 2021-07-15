<div x-cloak x-data="{ open: false }" @keydown.window.escape="open = false" @click.away="open = false"
    class="relative inline-block text-left font-heading uppercase text-gray-900 {{ $class ?? '' }}">
    <div>
        <span class="rounded-md shadow-sm">
            @if(count($item->children) > 0)
            <button @click="open = !open" type="button"
                class="uppercase text-left flex justify-between w-full px-4 py-2 {{ $background }} @if($item->parent !== false) hover:bg-gray-200 @endif text-sm leading-5 font-medium hover:text-gray-700 focus:outline-none focus:border-blue-100 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150">
                {!! $item->label !!}
                <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            @else
            <a class="inline-flex justify-center w-full px-4 py-2 {{ $background }} text-sm leading-5 font-medium hover:text-gray-700 focus:outline-none focus:border-blue-100 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                href="{{ $item->url }}" target="{{ $item->target }}">
                {{ $item->label }}
            </a>
            @endif
        </span>
    </div>
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right {{ $position ?? 'absolute' }} right-0 mt-2 w-84 rounded-md shadow-lg {{ $child ?? 'z-10' }}">
        <div class="rounded-md {{ $background }} shadow-xs">
            <div class="py-1 {{ $columns ?? "" }}">
                @foreach($item->children as $item)
                @if(count($item->children) > 0)
                @php
                if(count($item->children) > 10) {
                    $split = "grid grid-cols-3";
                    $position = "relative";
                }
                @endphp
                @include('partials.nav-desktop', ['class' => 'w-full', 'item' => $item, 'child' => 'z-50', 'columns' => $split, 'position' => $position ])
                @else
                <a href="{{ $item->url }}" target="{{ $item->target }}"
                    class="block px-4 py-2 text-sm leading-5 hover:bg-gray-200 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                    {{ $item->label }}</a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
