<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Subpages extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Subpages';

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
    public $mode = 'preview';

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
    public $supports = [
        'align' => false
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'subpages' => $this->subpages(),
            'intro_text' => $this->intro_text(),
            'block_classes' => $this->getBlockClasses()
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
        $subpages = new FieldsBuilder('subpages');

        $subpages
        ->addText('intro_text', [
            'label' => 'Subpages Intro Text',
            'instructions' => 'The text that appears before the list of subpages. If left blank, nothing will be displayed.'
        ]);

        return $subpages->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function subpages()
    {
        global $post;
        $args = array(
        'child_of'    => $post->ID,
        'post_type'      => 'page',
    );

    $subpages = get_pages( $args );
        return $subpages;
    }
    public function intro_text()
    {
        return get_field('intro_text') ?: [];
    }
}
