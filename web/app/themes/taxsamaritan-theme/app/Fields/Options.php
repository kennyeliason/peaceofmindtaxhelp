<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Options extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $options = new FieldsBuilder('options');

        $options
            ->setLocation('options_page', '==', 'options');

        $options
            ->addGroup('header')
                ->addLink('red_button')
                ->addLink('login')
            ->endGroup()
            ->addRepeater('socials', [
                    'min' => 1,
                    'button_label' => 'Add Social Media',
                    'label' => 'Social Media'
                ])
                ->addLink('social-media', [
                    'label' => 'Social Link'
                ])
            ->endRepeater();

        return $options->build();
    }
}
