<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class LogoColors extends Block
{
    use BlockClasses;
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Logo Colors';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Grid of logos with background colors.';

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
            'logos' => $this->logos(),
            'trusted_by' => $this->trusted_by(),
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
        $logoColors = new FieldsBuilder('logo_colors');

        $logoColors
        ->addText('trusted_by')
        ->addRepeater('logos', [
            'label' => 'Logos',
            'button_label' => 'Add Logo',
            'layout' => 'table',
            'width' => 25
        ])
        ->addImage('logo_image', [
            'label' => 'Logo'
        ])
        ->addColorPicker('logo_background', [
            'default_value' => '#0096d6'
        ]);;

        return $logoColors->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function logos()
    {
        return get_field('logos') ?: [];
    }
    public function trusted_by()
    {
        return get_field('trusted_by') ?: [];
    }
}
