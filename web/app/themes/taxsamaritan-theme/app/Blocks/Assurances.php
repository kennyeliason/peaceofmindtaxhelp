<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Assurances extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Assurances';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Square boxes with badges to instill confidence.';

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
    public $icon = 'dashicons-smiley';

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
            'assurances' => $this->assurances(),
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
        $assurances = new FieldsBuilder('assurances');

        $assurances
            ->addRepeater('assurances', [
                    'min' => 2,
                    'button_label' => 'Add Assurance',
                    'layout' => 'table',
                  ])
                ->addImage('icon')
                ->addText('heading')
                ->addTextarea('body')
                ->addLink('learn_more')
            ->endRepeater();

        return $assurances->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function assurances()
    {
        return get_field('assurances') ?: [];
    }
}
