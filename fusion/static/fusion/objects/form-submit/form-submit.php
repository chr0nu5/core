<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRFormSubmit implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'form-submit';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Form Submit',
            'description' => 'Create a new form submit button.',
            'icon' => 'fa fa-cube',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'form-submit-admin-script' => objects_url() . 'form-submit/form-submit.admin.js'
            ),
            'keywords' => 'form, submit, bootstrap, button, btn',
            'filter' => '*',
            'order' => 29
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
                'description' => 'Choose the form submit button text.',
                'type' => 'text',
                'default' => 'Submit',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the form submit button element.',
                'type' => 'radio',
                'default' => 'btn-primary',
                'category' => null,
                'values' => array(
                    'btn-default' => 'Default',
                    'btn-primary' => 'Primary',
                    'btn-success' => 'Success',
                    'btn-info' => 'Info',
                    'btn-warning' => 'Warning',
                    'btn-danger' => 'Danger'
                ),
                'required' => false
            ),
            'size' => array(
                'title' => 'Size',
                'description' => 'Choose the size of the form submit button element.',
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
                'description' => 'Add additional classes to the form submit button object. Classes should be separated by a space. Example: <strong>btn-block</strong>',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the form submit button is in view.',
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
        extract(shortcode_atts(array(
            'text' => '',
            'type' => '',
            'size' => '',
            'classes' => '',
            'animation' => ''
                        ), $atts));

        $html = '';
        $html .= '<button type="submit" class="btn ' . $size . ' ' . $type . ' ' . $classes . '"';
        $html .= ' ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        $html .= $text;
        $html .= '</button>';

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
    $object = new WRFormSubmit();
    $webrock->add_object($object);
}
