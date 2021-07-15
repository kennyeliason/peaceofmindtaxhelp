@php
$testimonials_count = wp_count_posts('testimonial');
if($random_specific == 'RAND') {
    $args = array(
        'posts_per_page' => $number_of_testimonials,
        'post_type' => 'testimonial',
        'orderby' => 'rand'
    );
    $testimonials = get_posts($args);
} elseif($random_specific == 'specific') {
    $testimonials = $specific_testimonials;
}
$logo = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $logo , 'medium' );
$image_url = $image[0];
$wpseo_local = get_option('wpseo_local');
@endphp
<div class="{{ $block_classes }} alignwide col-gap-16" itemprop="itemReviewed" itemscope itemtype="http://schema.org/LocalBusiness">
    <div class="hidden">
        <span itemprop="name">{{ get_bloginfo('name') }}</span>
        <img itemprop="image" src="{{ $image_url }}" alt="{{ get_bloginfo('sitename') }}" />
        <span itemprop="address">{{ $wpseo_local['location_address'] }}, {{ $wpseo_local['location_city'] }}, {{ $wpseo_local['location_state'] }}, {{ $wpseo_local['location_zipcode'] }}</span>
        <span itemprop="telephone">{{ $wpseo_local['location_phone'] }}</span>
        <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <span itemprop="ratingValue">5</span>
            out of <span itemprop="bestRating">5</span>
            based on <span itemprop="ratingCount">{{ $testimonials_count->publish }}</span> user ratings
        </div>
        Price Range: <span itemprop="priceRange">$$</span>
    </div>
    @foreach($testimonials as $testimonial)
    <div class="single-testimonial inline-block w-full mb-12" itemprop="review" itemscope itemtype="http://schema.org/Review">
        <div class="testimonial-body border border-gray-500 bg-gray-300 text-gray-800 rounded p-8 font-thin relative mb-6 z-10" itemprop="reviewBody">
            {{ $testimonial->post_content }}
            <span class="quotes absolute z-20">
                @svg('images.quotes')
            </span>
            <span class="arrow block border-b border-r border-gray-500 bg-gray-300 h-8 w-8 transform rotate-45 absolute z-0">
            </span>
        </div>
        <div class="testimonial-author text-brand-600 uppercase font-bold md:ml-8">
            - <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{!! App\wrap_part($testimonial->post_title, '</span></span><span class="text-trim-600 font-normal">','</span>','(',')') !!}
        </div>
        <meta itemprop="datePublished" content="{{ $testimonial->post_date }}">
        <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
            <meta itemprop="worstRating" content = "1">
            <meta itemprop="ratingValue" content="5">
            <meta itemprop="bestRating" content="5">
        </span>
    </div>
    @endforeach
</div>
