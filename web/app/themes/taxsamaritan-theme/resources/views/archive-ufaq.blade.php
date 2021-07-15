@extends('layouts.app')

@section('content')
<div class="page-header text-center max-w-2xl">
    <h1 class="entry-title">Frequently Asked Questions - FAQs</h1>
</div>

{!! get_search_form(false) !!}

@php
$terms = get_terms( 'ufaq-category', array(
    'orderby'    => 'count',
    'order' => 'DESC',
    'hide_empty' => true,
) );
@endphp
<h2>FAQ Categories</h2>
<div class="h3">Ordered by Count</div>
    @foreach($terms as $term)
    @php
// The $term is an object, so we don't need to specify the $taxonomy.
    $term_link = get_term_link( $term );

    // If there was an error, continue to the next term.
    if ( is_wp_error( $term_link ) ) {
        continue;
    }
    @endphp
    <h3><a href="{{ esc_url( $term_link ) }}">{{ $term->name }}</a></h3>
    @endforeach

@endsection
