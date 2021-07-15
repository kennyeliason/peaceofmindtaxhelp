<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class BenefitBubbles extends Block
{
    use BlockClasses;

    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Benefit Bubbles';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Circle of bubbles on desktop, list on mobile.';

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
    public $icon = 'dashicons-image-filter';

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
    public $post_types = [];

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
    public $align = 'full';

    /**
     * Features supported by the block.
     *
     * @var array
     */
    public $supports = [
        'mode' => 'edit',
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'bubbles' => $this->bubbles(),
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
        $benefitBubbles = new FieldsBuilder('benefit_bubbles');

        $benefitBubbles
        ->addRepeater('bubbles', [
            'label' => 'Benefit Bubbles',
            'min' => 5,
            'max' => 5,
            'button_label' => 'Add Bubble',
            'layout' => 'table',
        ])
        ->addImage('bubble_icon')
        ->addText('bubble_text')
        ->endRepeater();

        return $benefitBubbles->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function bubbles()
    {
        return get_field('bubbles') ?: [];
    }
}
