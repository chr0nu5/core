<?php

/* =============================================
 * Column 
 * 
 * @type WebRock Object
 * ============================================= */

class WRColumn implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'column';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Column',
            'description' => 'Create a new bootstrap column. You can set the width to be responsive.',
            'icon' => 'fa fa-columns',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'column-admin-script' => objects_url() . 'column/column.admin.js'
            ),
            'keywords' => 'column, bootstrap',
            'filter' => '*',
            'order' => 47
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
            'xs' => array(
                'title' => 'Phone - xs',
                'description' => 'Choose the display width on mobile phones.',
                'type' => 'select',
                'default' => null,
                'category' => null,
                'values' => array(
                    '' => '',
                    'col-xs-1' => '1',
                    'col-xs-2' => '2',
                    'col-xs-3' => '3',
                    'col-xs-4' => '4',
                    'col-xs-5' => '5',
                    'col-xs-6' => '6',
                    'col-xs-7' => '7',
                    'col-xs-8' => '8',
                    'col-xs-9' => '9',
                    'col-xs-10' => '10',
                    'col-xs-11' => '11',
                    'col-xs-12' => '12'
                ),
                'required' => false
            ),
            'sm' => array(
                'title' => 'Tablet - sm',
                'description' => 'Choose the display width on tablets.',
                'type' => 'select',
                'default' => null,
                'category' => null,
                'values' => array(
                    '' => '',
                    'col-sm-1' => '1',
                    'col-sm-2' => '2',
                    'col-sm-3' => '3',
                    'col-sm-4' => '4',
                    'col-sm-5' => '5',
                    'col-sm-6' => '6',
                    'col-sm-7' => '7',
                    'col-sm-8' => '8',
                    'col-sm-9' => '9',
                    'col-sm-10' => '10',
                    'col-sm-11' => '11',
                    'col-sm-12' => '12'
                ),
                'required' => false
            ),
            'md' => array(
                'title' => 'Tablet - md',
                'description' => 'Choose the display width on laptops.',
                'type' => 'select',
                'default' => 'col-md-12',
                'category' => null,
                'values' => array(
                    '' => '',
                    'col-md-1' => '1',
                    'col-md-2' => '2',
                    'col-md-3' => '3',
                    'col-md-4' => '4',
                    'col-md-5' => '5',
                    'col-md-6' => '6',
                    'col-md-7' => '7',
                    'col-md-8' => '8',
                    'col-md-9' => '9',
                    'col-md-10' => '10',
                    'col-md-11' => '11',
                    'col-md-12' => '12'
                ),
                'required' => false
            ),
            'lg' => array(
                'title' => 'Desktop - lg',
                'description' => 'Choose the display width on desktops.',
                'type' => 'select',
                'default' => '',
                'category' => null,
                'values' => array(
                    '' => '',
                    'col-lg-1' => '1',
                    'col-lg-2' => '2',
                    'col-lg-3' => '3',
                    'col-lg-4' => '4',
                    'col-lg-5' => '5',
                    'col-lg-6' => '6',
                    'col-lg-7' => '7',
                    'col-lg-8' => '8',
                    'col-lg-9' => '9',
                    'col-lg-10' => '10',
                    'col-lg-11' => '11',
                    'col-lg-12' => '12'
                ),
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the column object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the animation to play when the heading is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => '',
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
            'xs' => '',
            'sm' => '',
            'md' => '',
            'lg' => '',
            'classes' => '',
            'animation' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="col ' . $xs . ' ' . $sm . ' ' . $md . ' ' . $lg . ' ' . $classes . '" ' . ($animation != null ? 'data-animate="' . $animation . '"' : '') . ' >'
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
    $object = new WRColumn();
    $webrock->add_object($object);
}
