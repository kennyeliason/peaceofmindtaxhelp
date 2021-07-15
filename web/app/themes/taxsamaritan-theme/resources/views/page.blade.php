@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        @if(!is_front_page() && !has_block('acf/jumbo-curve'))
            @include('partials.breadcrumbs')
            @include('partials.page-header')
        @endif
        @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
@endsection
