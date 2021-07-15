<div class="{{ $block_classes ?? '' }} grid grid-cols-2 gap-12 mb-8 pb-10">
    <div class="videos col-span-2 md:order-1 md:col-span-1 md:row-span-3">
        @php
        $count = 0;
        @endphp
        @foreach ($clients as $client)
        @php
        $count++;
        @endphp
        <div class="video {{ $count == 1 ? 'block' : 'hidden' }}" data-client="client-{{ $count}}">
            @if($client['video'])
            {!! $client['video'] !!}
            @else
            <img src="{!! $client['flag']['url'] !!}" alt="{!! $client['flag']['alt'] !!}" class="flag object-cover w-full">
            @endif
        </div>
        @endforeach
    </div>
    <div class="flags col-span-2 order-first md:order-2 md:col-span-1 md:row-span-1 h-auto">
        <div class="flags-inner overflow-x-auto">
        @php
        $count2 = 0;
        @endphp
        @foreach ($clients as $client)
        @php
        $count2++;
        @endphp
        <img src="{!! $client['flag']['sizes']['thumbnail'] !!}" alt="{!! $client['flag']['alt'] !!}" class="flag {{ $count2 == 1 ? 'opacity-100' : 'opacity-50' }} h-16" data-client="client-{{ $count2}}">
        @endforeach
        </div>
    </div>
    <div class="snippet col-span-2 md:order-3 md:col-span-1 md:row-span-1 h-auto">
        @php
        $count3 = 0;
        @endphp
        @foreach ($clients as $client)
        @php
        $count3++;
        @endphp
        <div class="snippet {{ $count3 == 1 ? 'block' : 'hidden' }}" data-client="client-{{ $count3 }}">
            {!! $client['snippet'] !!}
        </div>
        @endforeach
    </div>
    <div class="view-all-testimonials md:order-4 col-span-2 md:col-span-1 md:row-span-1 mx-auto h-auto">
        <a href="{{ $view_all['url'] }}" target="{{ $view_all['target'] }}" class="text-white">View All Testimonials</a>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery('.flag').click(function() {
            // console.log(this.data('client'));
            var clientID = jQuery(this).data('client');
            // console.log(clientID);
            jQuery('.opacity-100').addClass('opacity-50');
            jQuery('.opacity-100').removeClass('opacity-100');
            jQuery(this).removeClass('opacity-50');
            jQuery(this).addClass('opacity-100');
            jQuery('.video.block').addClass('hidden').removeClass('block');
            jQuery('.snippet.block').addClass('hidden').removeClass('block');
            jQuery('.video[data-client=' + clientID +']').removeClass('hidden').addClass('block');
            jQuery('.snippet[data-client=' + clientID +']').removeClass('hidden').addClass('block');
        });
    });
</script>
