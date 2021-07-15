<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Animagination extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Animagination';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Two images, one animated';

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
    public $icon = 'dashicons-image-rotate-right';

    /**
     * An array of block keywords.
     *
     * @var array
     */
    public $keywords = ['neonbrand', 'animagination'];

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
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue() {
        $assets = [
            'scripts/blocks/animagination.js',
            'styles/blocks/animagination.css'
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $animagination = new FieldsBuilder('animagination');

        $animagination
        ->addImage('stable_image', [
            'label' => 'Large Image',
       ])
        ->addImage('animated_image', [
            'label' => 'Small Image',
            'preview_size' => 'thumbnail'
       ]);

        return $animagination->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function stable_image() {
        return get_field('stable_image') ?: '';
    }

    public function animated_image() {
        return get_field('animated_image') ?: '';
    }

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'stable_image'   => $this->stable_image(),
            'animated_image' => $this->animated_image(),
            'block_classes'  => $this->getBlockClasses(),
        ];
    }
}
