<div class="{{ $block_classes ?? ''}} grid md:grid-cols-3 sm:grid-cols-1 gap-12 max-w-6xl w-full">
    @foreach($featured_pages as $page)
    <div class="featured-page relative">
        @php
        $page_icon = get_field('page_icon', $page->ID);
        @endphp
        <a href="{{ get_permalink($page->ID) }}" class="text-white">
            <div class="w-full h-64">
                {!! App\nb_get_post_thumbnail($page->ID, 'large', ['class' => 'object-cover h-64 w-full']) !!}
            </div>
            <img class="page-icon bg-radial-brandbrand h-16 w-16 absolute rounded-full border-white border-2 -mt-10" scr="{{ $page_icon['url'] }}" alt="{{ $page_icon['alt'] }}" />

            <div class="bg-trim-500 border-2 border-white text-center w-3/4 mx-auto -mt-4 font-heading uppercase text-xl relative py-1 mb-4">
                {!! App\wrap_last(get_the_title($page->ID)) !!}
            </div>
        </a>
        <div class="featured-excerpt text-center font-thin mx-2 md:mt-0">
            {!! get_the_excerpt($page->ID) !!}
        </div>
    </div>
    @endforeach
</div>
