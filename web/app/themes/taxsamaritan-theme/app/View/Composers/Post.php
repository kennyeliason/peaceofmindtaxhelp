<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title' => $this->title(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ('partials.page-header' !== $this->view->name()) {
            return get_the_title();
        }

        global $paged;
        global $page;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $pagenum = '';
        if ($paged > 1) {
            $pagenum = ' - Page ' . $paged;
        }

        if ($page > 1) {
            $pagenum = ' - Page ' . $page;
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home) . $pagenum;
            }

            return __('Latest Posts', 'sage');
        }

        if (is_archive()) {
            if (is_post_type_archive()) {
                return get_the_title() . $pagenum;
            }
            if(is_tax()) {
                return 'FAQs - ' . single_term_title('', false);
            }

            return get_the_archive_title();
        }

        if (is_search()) {
            /* translators: %s is replaced with the search query */
            return sprintf(
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }
}
