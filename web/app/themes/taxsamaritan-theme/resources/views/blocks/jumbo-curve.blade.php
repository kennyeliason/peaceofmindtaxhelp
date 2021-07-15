@php
// var_dump($jumbo_background);
@endphp
<div class="{{ $block_classes ?? ''}} relative overflow-hidden">
    <div class="curved relative border-b-8 border-trim-400" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{$jumbo_background['url']}});">
        <div class="absolute w-full bottom-0 pb-16">
            <div class="max-w-2xl mx-auto">
                <div class="jumbo-text text-white">
                    {!! $jumbo_text !!}
                </div>
                @if($jumbo_button['url'] <> '')
                <div class="jumbo-button text-center">
                    <a class="bg-radial-brandbrand inline-block text-white uppercase py-4 px-8 border-2 border-white text-lg md:text-2xl font-heading font-light" href="{{ $jumbo_button['url'] }}" target="{{ $jumbo_button['target'] }}">{{ $jumbo_button['title'] }} <svg style="display:inline-block;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0.25in" height="0.264in"><image  x="0px" y="0px" width="18px" height="19px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAATCAQAAAA3m5V5AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkBB4JNjSjPisXAAAAj0lEQVQoz43QQRHDMAxE0YUgCIUQSIYQCIVQCIFQCIUQCIVgBj8H144UJ27Gp9W+GY0lxAO5F5MQEhOZpQ0SuNTQG1yxhtSQhcLOWF+cMHGDVT1k++YB87+4ZPEixheA+ZcyACmiBEBmQogFgBW7Qfy6S7KjAaloSAr6Q9CRvHqCyrgS8elJWTc3IoznkaANEmrHe5qQyWwAAAAASUVORK5CYII=" /></svg></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
