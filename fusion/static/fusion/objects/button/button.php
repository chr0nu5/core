<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRButton implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'button';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Button',
            'description' => 'Create a new bootstrap button.',
            'icon' => 'fa fa-cube',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'preview' => '<img src="' . objects_url() . '/button/preview.jpg" alt="Button" />',
            'scripts-admin' => array(
                'button-admin-script' => objects_url() . 'button/button.admin.js'
            ),
            'keywords' => 'button, bootstrap, call to action, btn',
            'filter' => '*',
            'order' => 15
        );
    }

    /* ===
     * Attributes
     * 
     * @role returns the object attributes
     *       as an array
     * @used to create inputs of chosen type and
     *       generate the object creation form
     * === */

    function attributes() {
        return array(
            'text' => array(
                'title' => 'Text',
                'description' => 'Choose the button text.',
                'type' => 'text',
                'default' => 'Button',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'href' => array(
                'title' => 'Link',
                'description' => 'Choose what the button will link to. Inpage links will scroll to the linked element.',
                'type' => 'text',
                'default' => '#',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the button element.',
                'type' => 'radio',
                'default' => 'btn-primary',
                'category' => null,
                'values' => array(
                    'btn-default' => 'Default',
                    'btn-inverse' => 'Inverse',
                    'btn-primary' => 'Primary',
                    'btn-success' => 'Success',
                    'btn-info' => 'Info',
                    'btn-warning' => 'Warning',
                    'btn-danger' => 'Danger'
                ),
                'required' => false
            ),
            'style' => array(
                'title' => 'Style',
                'description' => 'Choose the style of the button element.',
                'type' => 'radio',
                'default' => 'btn',
                'category' => null,
                'values' => array(
                    'btn' => 'Default',
                    'btn btn-bordered' => 'Bordered'
                ),
                'required' => false
            ),
            'size' => array(
                'title' => 'Size',
                'description' => 'Choose the size of the button element.',
                'type' => 'radio',
                'default' => 'btn-md',
                'category' => null,
                'values' => array(
                    'btn-xs' => 'Extrasmall',
                    'btn-sm' => 'Small',
                    'btn-md' => 'Medium',
                    'btn-lg' => 'Large'
                ),
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the button object. Classes should be separated by a space. Example: <strong>btn-block</strong>',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the button is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => 'Text',
                'values' => null,
                'required' => false
            )
        );
    }

    /* ===
     * Create
     * 
     * @role function used to generate
     *       the actual object html
     * 
     * @atts {array}
     * @content {string}
     * 
     * @return {string}
     * 
     * @code snippets
     * Animation
     * ' . ($animation != '' ? ' data-animate="' . $animation . '"' : '') . ' 
     * Icons
     * '<i class="' . $icon . '"></i>'
     * 
     * === */

    function create($atts, $content = null) {
        $atts = webrock_atts_decode($atts);
        extract(webrock_atts($this->attributes(), $atts));

        $html = '';
        $html .= '<a class="' . $style . ' ' . $size . ' ' . $type . ' ' . $classes . '" href="' . $href . '"';
        if ($href != '' && $href[0] == '#') {
            $html .= ' data-scrollTo="true"';
        }
        $html .= ' ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        $html .= $text;
        $html .= '</a>';

        return $html;
    }

}

/* =============================================
 * Add to WebRock 
 * 
 * @role adds the object config and shortcode to
 *       the WebRock framework
 * ============================================= */
if (defined('WEBROCK')) {
    $object = new WRButton();
    $webrock->add_object($object);
}
