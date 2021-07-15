<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Pages extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $pages = new FieldsBuilder('pages');

        $pages
            ->setLocation('post_type', '==', 'page')
            ->addImage('page_icon');

        return $pages->build();
    }
}
