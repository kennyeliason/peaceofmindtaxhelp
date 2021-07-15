<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use Illuminate\Support\Arr;

class Curve extends Block {

    use BlockClasses;

    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Curve';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'The super dope curved line block.';

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
    public $icon = 'tide';

    /**
     * An array of block keywords.
     *
     * @var array
     */
    public $keywords = ['post','neonbrand','curve'];

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
    public $supports = [ 'mode' => false, 'align' => false ];

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue() {
        //
    }

    public function paletteColors() {
        if (file_exists($tailwindLocation = get_theme_file_path() . '/tailwind.json')) {
            $colors = [];

            $config = json_decode(file_get_contents($tailwindLocation), true);

            foreach (Arr::dot($config['colors']) as $slug => $color) {
                $title = str_replace(['-', '_', '.'], ' ', mb_convert_case($slug, MB_CASE_TITLE, 'UTF-8'));
                $slug = str_replace('.', '-', $slug);

                $colors[$slug] = $title;
            }
            return $colors;
        }
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields() {
        $curve = new FieldsBuilder('curve');

        $curve
        ->addRadio('curve_direction',
            [
                'choices' => array(
                    'bottom' => 'Up',
                    'top' => 'Down',
                ),
                'wrapper' => [
                    'width' => '25%',
                    'class' => '',
                    'id' => '',
                ],
            ])
        ->addSelect('main_color', [
            'label' => 'Main Color',
            'choices' => $this->paletteColors(),
            'wrapper' => [
                'width' => '25%',
                'class' => '',
                'id' => '',
            ],
        ])
        ->addSelect('secondary_color', [
            'label' => 'Secondary Color',
            'choices' => $this->paletteColors(),
            'wrapper' => [
                'width' => '25%',
                'class' => '',
                'id' => '',
            ],
        ])
        ->addSelect('border_color', [
            'label' => 'Border Color',
            'choices' => $this->paletteColors(),
            'wrapper' => [
                'width' => '25%',
                'class' => '',
                'id' => '',
            ],
        ]);

        return $curve->build();
    }

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'main_color' => $this->mainColor(),
            'secondary_color' => $this->secondaryColor(),
            'border_color' => $this->borderColor(),
            'curve_direction' => $this->curveDirection(),
            'block_classes'  => $this->getBlockClasses(),
        ];
    }

    /**
     * Return the curve_direction field.
     *
     * @return array
     */
    public function curveDirection() {
        return get_field('curve_direction') ?: [];
    }

    /**
     * Return the main_color field.
     *
     * @return array
     */
    public function mainColor() {
        return get_field('main_color') ?: [];
    }

    /**
     * Return the secondary_color field.
     *
     * @return array
     */
    public function secondaryColor() {
        return get_field('secondary_color') ?: [];
    }

    /**
     * Return the border_color field.
     *
     * @return array
     */
    public function borderColor() {
        return get_field('border_color') ?: [];
    }
}
