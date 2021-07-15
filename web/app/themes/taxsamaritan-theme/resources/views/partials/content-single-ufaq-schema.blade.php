<article @php(post_class())>
    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <h3 itemprop="name">{!! $title !!}</h3>
        <div class="entry-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <div itemprop="text">
                @php(the_content())
            </div>
        </div>
    </div>
</article>
