<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Versus extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Versus';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Block 1 vs Block 2';

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
    public $icon = 'dashicons-arrow-down-alt2';

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
            'wins' => $this->wins(),
            'losses' => $this->losses(),
            'win_title' => $this->win_title(),
            'loss_title' => $this->loss_title(),
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
        $versus = new FieldsBuilder('versus');

        $versus
            ->addTab('Wins')
            ->addText('win_title')
            ->addRepeater('wins')
            ->addText('win_item')
            ->endRepeater()

            ->addTab('Losses')
            ->addText('loss_title')
            ->addRepeater('losses')
            ->addText('loss_item')
            ->endRepeater();

        return $versus->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function wins()
    {
        return get_field('wins') ?: [];
    }
    public function losses()
    {
        return get_field('losses') ?: [];
    }
    public function win_title()
    {
        return get_field('win_title') ?: [];
    }
    public function loss_title()
    {
        return get_field('loss_title') ?: [];
    }
}
