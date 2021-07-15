<time class="updated" datetime="{{ get_post_time('c', true) }}">
    {{ get_the_date() }}
</time>

<div class="byline author vcard">
    <span>{{ __('By', 'sage') }}</span>
    <span rel="author" class="fn">
        {{ get_the_author() }}
    </span>
</div>
