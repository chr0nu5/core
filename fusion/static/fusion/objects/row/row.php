<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRRow implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'row';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Row',
            'description' => 'Create a new bootstrap row. The row covers 100% of the container width.',
            'icon' => 'fa fa-square-o',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'row-admin-script' => objects_url() . 'row/row.admin.js'
            ),
            'keywords' => 'row, bootstrap',
            'filter' => '*',
            'order' => 46
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
            'margin' => array(
                'title' => 'Margin',
                'description' => 'Choose the css margin of the object. See <a href="http://www.w3schools.com/css/box-model.gif" target="_blank">here</a> how margin and padding works.',
                'type' => 'margin',
                'default' => '',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'padding' => array(
                'title' => 'Padding',
                'description' => 'Choose the css padding of the object. See <a href="http://www.w3schools.com/css/box-model.gif" target="_blank">here</a> how margin and padding works.',
                'type' => 'padding',
                'default' => '',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the row object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => 'margin-top-2x margin-bottom-2x',
                'category' => 'Classes',
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
        extract(shortcode_atts(array(
            'classes' => '',
            'margin' => '',
            'padding' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="row ' . $classes . '" '
                . ($margin != '' || $padding != '' ? 'style="'
                        . ($margin != '' ? 'margin: ' . $margin . ';' : '' )
                        . ($padding != '' ? ' padding: ' . $padding . ';' : '' )
                        . '"' : '')
                . '>'
                . webrock_do_shortcode($content)
                . '</div>';

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
    $object = new WRRow();
    $webrock->add_object($object);
}
