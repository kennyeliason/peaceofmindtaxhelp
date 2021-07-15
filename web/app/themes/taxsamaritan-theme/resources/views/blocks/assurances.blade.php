<div class="{{ $block_classes ?? '' }} grid md:grid-cols-2 gap-12 max-w-5xl pb-4">
    @foreach ($assurances as $assurance)
    <div class="relative bg-gray-100 border border-gray-400 rounded text-center mt-16">
        <img src="{{ $assurance['icon']['url'] }}" alt="{{ $assurance['icon']['alt'] }}" class="ass-img aligncenter -mt-16 h-32 object-contain">
        <div class="ass-heading font-heading text-brand-600 uppercase text-2xl ">
            {{ $assurance['heading'] }}
        </div>
        <div class="ass-body text-gray-800 p-8">
            {{ $assurance['body'] }}
        </div>
        <a href="{{ $assurance['learn_more']['url'] }}" target="{{ $assurance['learn_more']['target'] }}" class="ass-link text-center bg-trim-500 text-white py-2 px-8 uppercase font-heading text-lg align-bottom">{{ $assurance['learn_more']['title'] ?: 'Learn More' }}</a>
    </div>
    @endforeach
</div>
