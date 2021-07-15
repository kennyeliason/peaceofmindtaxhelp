<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class VideoTestimonials extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Video Testimonials';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Video testimonials from clients and flags from their country.';

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
    public $icon = 'dashicons-flag';

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
            'clients' => $this->clients(),
            'view_all' => $this->view_all(),
            'block_classes' => $this->getBlockClasses(),
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
        $videoTestimonials = new FieldsBuilder('video_testimonials');

        $videoTestimonials
            ->addLink('view_all')
            ->addRepeater('clients')
                ->addOembed('video')
                ->addImage('flag')
                ->addWysiwyg('snippet')
            ->endRepeater();

        return $videoTestimonials->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function clients()
    {
        return get_field('clients') ?: [];
    }
    public function view_all()
    {
        return get_field('view_all') ?: [];
    }
}
