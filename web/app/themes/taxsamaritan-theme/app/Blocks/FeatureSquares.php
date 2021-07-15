<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FeatureSquares extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'FeatureSquares';

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
    public $icon = 'images-alt2';

    /**
     * An array of block keywords.
     *
     * @var array
     */
    public $keywords = ['neonbrand','featured'];

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
    public $align = '';

    /**
     * Features supported by the block.
     *
     * @var array
     */
    public $supports = [];

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
        $featureSquares = new FieldsBuilder('feature_squares');

        $featureSquares
            ->addRepeater('features')
                ->addImage('featured_icon')
                ->addText('featured_title')
                ->addTextarea('featured_content')
            ->endRepeater();

        return $featureSquares->build();
    }

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'features' => $this->features(),
            'block_classes'  => $this->getBlockClasses(),
        ];
    }

    /**
     * Return the features field.
     *
     * @return array
     */
    public function features()
    {
        return get_field('features') ?: [];
    }
}
