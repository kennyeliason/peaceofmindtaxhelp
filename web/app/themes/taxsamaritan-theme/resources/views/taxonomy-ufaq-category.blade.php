@extends('layouts.app')

@section('content')
@include('partials.breadcrumbs')
@include('partials.page-header')

@if (! have_posts())
@alert(['type' => 'warning'])
{{ __('Sorry, no results were found.', 'sage') }}
@endalert

{!! get_search_form(false) !!}
@endif

@while(have_posts()) @php(the_post())
@includeFirst(['partials.content-single-ufaq-schema', 'partials.content'])
@endwhile

{!! $pagination !!}

@endsection

