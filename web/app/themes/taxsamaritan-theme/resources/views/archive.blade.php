@extends('layouts.app')

@section('content')
@include('partials.page-header')

@if (! have_posts())
@component('components.alert', ['type' => 'warning'])
{{ __('Sorry, no results were found.', 'sage') }}
@endcomponent

{!! get_search_form(false) !!}
@endif

<?php
$count = 1;
$perPage = (int) get_option( 'posts_per_page');
?>
@while(have_posts()) @php(the_post())
@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
@if(!($count >= $perPage))
<hr class="container mx-auto my-12">
@endif
@php($count++)
@endwhile

{!! $pagination !!}

@endsection
@section('sidebar')
@include('partials.sidebar')
@endsection
