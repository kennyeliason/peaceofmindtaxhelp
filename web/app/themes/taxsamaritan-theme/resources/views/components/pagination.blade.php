<?php
$spacing = "px-4 py-2 mr-3 uppercase";
$colors = "text-white border-white shadow border-4 bg-trim-500 leading-9 font-heading"
?>

<div class="container mx-auto flex justify-center">
    @if ($pagi->hasPages())
    <nav class="flex items-center my-8" role="navigation" aria-label="pagination">
        @if (! $pagi->onFirstPage())
        <a href="{{ $pagi->previousPageUrl() }}" rel="prev" aria-label="Previous Page"
            class="{{ $spacing }} {{ $colors }}">&laquo; Read Past Articles</a>
        @endif

        @if ($pagi->hasMorePages())
        <a href="{{ $pagi->nextPageUrl() }}" rel="next" aria-label="Next Page" class="{{ $spacing }} {{ $colors }}">Read
            More Articles <span class="text-2xl leading-none">&raquo;</span></a>
        @endif
    </nav>
    @endif
</div>
