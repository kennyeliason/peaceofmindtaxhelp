<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FeaturePages extends Block
{

    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Feature Pages';

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
            'featured_pages' => $this->featured_pages(),
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
        $featurePages = new FieldsBuilder('feature_pages');

        $featurePages
            ->addPostObject('featured_pages', ['multiple' => 1, 'post_type' => ['page', 'post']]);

        return $featurePages->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function featured_pages()
    {
        return get_field('featured_pages') ?: [];
    }
}
