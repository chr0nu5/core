<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRAlert implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'alert';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Alert',
            'description' => 'Create a new alert.',
            'icon' => 'fa fa-exclamation-triangle',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'alert-admin-script' => objects_url() . 'alert/alert.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/alert/preview.jpg" alt="Alert" />',
            'keywords' => 'alert, bootstrap, important, notification, notice',
            'filter' => '*',
            'order' => 20
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
                'description' => 'Choose the alert text to be displayed.',
                'type' => 'wysiwyg',
                'default' => '<strong>Well done!</strong> You successfully read this important alert message.',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the alert element.',
                'type' => 'radio',
                'default' => 'alert-success',
                'category' => null,
                'values' => array(
                    'alert-success' => "Success",
                    'alert-info' => "Info",
                    'alert-warning' => "Warning",
                    'alert-danger' => "Danger"
                ),
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the alert is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the alert object. Classes should be separated by a space.',
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
            'type' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));
        $html = '';
        $html .= '<div ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . ' class="alert ' . $classes . ' ' . $type . '">';
        $html .= html_entity_decode($text);
        $html .= '</div>';

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
    $object = new WRAlert();
    $webrock->add_object($object);
}
