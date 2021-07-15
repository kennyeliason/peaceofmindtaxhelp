<?php

namespace App\View\Composers;

use Log1x\Pagi\PagiFacade;
use Roots\Acorn\View\Composer;

class Pagination extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index',
        'archive-*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'pagination' => $this->pagination(),
        ];
    }

    public function pagination()
    {
        $pagination = PagiFacade::build();
        $pagination->onEachSide = 1;

        return $pagination->links('components.pagination');
    }
}
