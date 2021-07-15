@if ($features)
<div class="{{ $block_classes ?? ''}} grid md:grid-cols-2 sm:grid-cols-1 gap-4">
    @foreach ($features as $feature)
    <div class="relative bg-gray-100 border border-gray-400 p-10 mt-8 md:mt-10">
        <div class="bg-radial-brandbrand p-3 d-block absolute -top-8 h-20 w-20">
           <img class="object-fill h-full mx-auto" src="{{ $feature['featured_icon']['url'] }}" />
       </div>
       <h3 class="pl-0 text-trim-500 uppercase text-2xl pt-8 has-text-color">{{ $feature['featured_title'] }}</h3>
       <div class="text-gray-900">{{ $feature['featured_content'] }}</div>
   </div>
   @endforeach
</div>
@else
<p>No features found!</p>
@endif
