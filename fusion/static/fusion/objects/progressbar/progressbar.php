<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRProgressBar implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'progressbar';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Progress Bar',
            'description' => 'Create a new progressbar.',
            'icon' => 'fa fa-tasks',
            'styles' => array(
                'progressbar-style' => objects_url() . 'progressbar/progressbar.css'
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'progressbar-admin-script' => objects_url() . 'progressbar/progressbar.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/progressbar/preview.jpg" alt="Progress Bar" />',
            'keywords' => 'progress, bar, progressbar, bootstrap',
            'filter' => '*',
            'order' => 21
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
            'complete' => array(
                'title' => 'Complete',
                'description' => 'Choose the progress bar completion percentage.',
                'type' => 'text',
                'default' => '60%',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the progressbar element.',
                'type' => 'radio',
                'default' => 'progress-bar-danger',
                'category' => null,
                'values' => array(
                    'progress-bar-success' => "Success",
                    'progress-bar-info' => "Info",
                    'progress-bar-warning' => "Warning",
                    'progress-bar-danger' => "Danger"
                ),
                'required' => false
            ),
            'size' => array(
                'title' => 'Size',
                'description' => 'Choose the size of the progressbar element.',
                'type' => 'radio',
                'default' => 'progress-bar-medium',
                'category' => null,
                'values' => array(
                    '' => "Thick",
                    'progress-bar-medium' => "Medium",
                    'progress-bar-slim' => "Slim"
                ),
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the progressbar is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => null,
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
            'complete' => '',
            'type' => '',
            'size' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));
        $html = '';
        $html .= '<div class="progress ' . $classes . ' ' . $size . '" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        $html .= '<div class="progress-bar ' . $type . '" role="progressbar" aria-valuenow="' . str_replace("%", "", $complete) . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $complete . '"></div>';
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
    $object = new WRProgressBar();
    $webrock->add_object($object);
}
