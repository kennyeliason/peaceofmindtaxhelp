@if (! post_password_required())
  <section id="comments" class="comments max-w-2xl mx-auto">
    @if (have_comments())
      <div class="text-4xl font-heading">
        {!! sprintf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>') !!}
      </div>

      <ul class="comment-list">
        {!! wp_list_comments(['style' => 'ul', 'short_ping' => true, 'format' => 'html5']) !!}
      </ul>

      @if (get_comment_pages_count() > 1 && get_option('page_comments'))
        <nav>
          <ul class="pager">
            @if (get_previous_comments_link())
              <li class="previous">
                {!! get_previous_comments_link(__('&larr; Older comments', 'sage')) !!}
              </li>
            @endif

            @if (get_next_comments_link())
              <li class="next">
                {!! get_next_comments_link(__('Newer comments &rarr;', 'sage')) !!}
              </li>
            @endif
          </ul>
        </nav>
      @endif
    @endif

    @if (! comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
      @alert(['type' => 'warning'])
        {{ __('Comments are closed.', 'sage') }}
      @endalert
    @endif

    @php(comment_form())
  </section>
@endif
