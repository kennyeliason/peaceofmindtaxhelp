import '@wordpress/edit-post';
import domReady from '@wordpress/dom-ready';
import {
    unregisterBlockStyle,
    registerBlockStyle,
} from '@wordpress/blocks';

domReady(() => {
    unregisterBlockStyle( 'core/button', 'default' );

});
