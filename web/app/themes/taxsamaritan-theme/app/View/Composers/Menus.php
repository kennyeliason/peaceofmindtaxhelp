<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;

class Menus extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
        'partials.footer',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'headerMenu' => $this->headerMenu(),
        ];
    }

    public function headerMenu()
    {
        $navigation = ( new Navi() )->build('primary_navigation');

        if ($navigation->isEmpty()) {
            return json_encode([]);
        }

        return $navigation->toArray();
    }
}
