<?php

namespace App\Blocks;

use Illuminate\Support\Str;

trait BlockClasses {

    public function getBlockClasses() {
        return $this->processBlockClasses();
    }

    public function processBlockClasses() {
        $block   = $this->block;
        $align   = !empty($block->align) ? 'align' . $block->align : '';
        $title   = 'wp-block-' . Str::slug($block->title);
        $classes = $block->className ?? '';

        return preg_replace('/ {2,}/', ' ', trim($title . ' ' . $classes . ' ' . $align));
    }
}