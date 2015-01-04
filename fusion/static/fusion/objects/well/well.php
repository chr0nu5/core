<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRWell implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'well';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Well',
            'description' => 'Create a new well from WYSIWYG editor.',
            'icon' => 'fa fa-square',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'well-admin-script' => objects_url() . 'well/well.admin.js'
            ),
            'keywords' => 'well, bootstrap',
            'filter' => '*',
            'order' => 40
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
                'description' => 'Input the content of the well.',
                'type' => 'wysiwyg',
                'default' => 'Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong>',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the well is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the textarea object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => null,
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
            'text' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<div ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . ' class="well ' . $classes . '">'
                . html_entity_decode($text)
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
    $object = new WRWell();
    $webrock->add_object($object);
}
