<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CurveBadge extends Block
{

    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Curve Badge';

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
    public $icon = 'dashicons-awards';

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
    public $mode = false;

    /**
     * The block alignment class.
     *
     * @var string
     */
    public $align = '';

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
            'curve_image' => $this->curveBadge(),
            'curve_position' => $this->curvePosition(),
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
        $curveBadge = new FieldsBuilder('curve_badge');

        $curveBadge
            ->addImage('curve_image')
            ->addRadio('curve_position', [
                'choices' => ['above','below']
            ]);

        return $curveBadge->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function curveBadge()
    {
        return get_field('curve_image') ?: [];
    }
    public function curvePosition()
    {
        return get_field('curve_position') ?: [];
    }
}
