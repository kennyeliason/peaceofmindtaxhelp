<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Testimonials extends Block
{
    use BlockClasses;

    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Testimonials';

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
            'number_of_testimonials' => $this->number_of_testimonials(),
            'specific_testimonials' => $this->specific_testimonials(),
            'random_specific' => $this->random_specific(),
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
        $testimonials = new FieldsBuilder('testimonials');

        $testimonials
        ->addRadio('random_specific', [
            'label' => 'Testimonials',
            'instructions' => 'Choose "random" to get any testimonials, or "Specific" to choose which testimonials to display.',
            'choices' => [
                'RAND' => 'Random',
                'specific' => 'Specific'
            ],
            'layout' => 'horizontal',
        ])
        ->addNumber('number_of_testimonials', [
            'label' => 'Number of Testimonials to Display',
            'instructions' => 'Use -1 to show all testimonials. Recommend choosing an even number to keep rows equal.',
            'default_value' => '-1',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'random_specific',
                        'operator' => '==',
                        'value' => 'RAND',
                    ),
                ),
            ),
        ])
        ->addRelationship('specific_testimonials', [
            'label' => 'Specific Testimonials',
            'instructions' => 'Drag and drop to change order of testimonials.',
            'post_type' => 'testimonial',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'random_specific',
                        'operator' => '==',
                        'value' => 'specific',
                    ),
                ),
            ),
        ]);

        return $testimonials->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function random_specific()
    {
        return get_field('random_specific');
    }
    public function number_of_testimonials()
    {
        return get_field('number_of_testimonials');
    }
    public function specific_testimonials()
    {
        return get_field('specific_testimonials');
    }
}
