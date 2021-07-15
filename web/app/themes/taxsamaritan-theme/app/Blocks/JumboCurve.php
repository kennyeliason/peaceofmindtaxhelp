<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use Illuminate\Support\Arr;

class JumboCurve extends Block
{

    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Jumbo Curve';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Lorem ipsum...';

    /**
     * The category this block belongs to.
     *
     * @var string
     */
    public $category = 'common';

    /**
     * The icon of this block.
     *
     * @var string|array
     */
    public $icon = 'star-half';

    /**
     * An array of block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * An array of post types the block will be available to.
     *
     * @var array
     */
    public $post_types = ['post', 'page'];

    /**
     * The default display mode of the block that is shown to the user.
     *
     * @var string
     */
    public $mode = 'edit';

    /**
     * The block alignment class.
     *
     * @var string
     */
    public $align = 'alignfull';

    /**
     * Features supported by the block.
     *
     * @var array
     */
    public $supports = [];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'jumbo_background' => $this->jumbo_background(),
            'jumbo_text' => $this->jumbo_text(),
            'jumbo_button' => $this->jumbo_button(),
            'block_classes'  => $this->getBlockClasses(),
        ];
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $jumboCurve = new FieldsBuilder('jumbo_curve');

        $jumboCurve
        ->addImage('jumbo_background')
        ->addWysiwyg('jumbo_text')
        ->addLink('jumbo_button');

        return $jumboCurve->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function jumbo_background()
    {
        return get_field('jumbo_background') ?: [];
    }
    public function jumbo_text()
    {
        return get_field('jumbo_text') ?: [];
    }
    public function jumbo_button()
    {
        return get_field('jumbo_button') ?: [];
    }
}
