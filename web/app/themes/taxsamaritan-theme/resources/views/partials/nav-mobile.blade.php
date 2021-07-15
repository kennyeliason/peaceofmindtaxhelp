<div class="justify-end flex-1 {{ $class ?? '' }}" x-cloak x-data="{ childOpen: false }" @keydown.window.escape="childOpen = false" @click.away="childOpen = false">
    @if(count($item->children) > 0)
    <button @click="childOpen = !childOpen" type="button" class="uppercase text-left flex justify-between w-full px-4 py-4 @if($item->parent !== false) @endif leading-5 font-medium hover:text-black focus:outline-none active:text-black transition ease-in-out duration-150">
        {{ $item->label }}
        <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>
    </button>
    <div class="w-full flex-grow" :class="{ 'z-20 top-0 left-0 bg-brand-600 text-white': childOpen, 'hidden': !childOpen }" @click.away="childOpen = false" x-show="true" x-transition:enter="ease-out duration-200" x-transition:enter-start="opacity-0 transform" x-transition:enter-end="opacity-100 transform" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 transform" x-transition:leave-end="opacity-0 transform">
        @foreach($item->children as $item)
        @if(count($item->children) > 0)
        @include('partials.nav-mobile', ['class' => 'w-full pl-4', 'item' => $item, 'child' => 'z-50'])
        @else
        <a href="{{ $item->url }}" target="{{ $item->target }}" class="block pl-8 pr-4 py-4 leading-5 hover:text-black focus:outline-none focus:text-black uppercase">
            {{ $item->label }}
        </a>
        @endif
        @endforeach
    </div>
    @else
    <a href="{{ $item->url }}" target="{{ $item->target }}" class="block px-4 py-4 leading-5 hover:text-gray-700 focus:outline-none focus:text-gray-900 uppercase">
        {{ $item->label }}
    </a>
    @endif
</div>
