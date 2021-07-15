<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class GrowingSquares extends Block
{
    use BlockClasses;

    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Growing Squares';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Squares that grow on hover.';

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
    public $icon = 'dashicons-editor-expand';

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
            'squares' => $this->squares(),
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
        $growingSquares = new FieldsBuilder('growing_squares');

        $growingSquares
        ->addRepeater('squares', [
            'label' => 'Growing Squares',
            'min' => 4,
            'max' => 4,
            'button_label' => 'Add Square',
            'layout' => 'table',
            'width' => '25%'
        ])
        ->addImage('square_icon', [
            'label' => 'Icon'
        ])
        ->addText('square_heading', [
            'label' => 'Heading'
        ])
        ->addText('square_text', [
            'label' => 'Subtext'
        ])
        ->endRepeater();

        return $growingSquares->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function squares()
    {
        return get_field('squares') ?: [];
    }
}
