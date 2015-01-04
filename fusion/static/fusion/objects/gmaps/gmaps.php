<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRGMaps implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'gmaps';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'GMaps',
            'description' => 'Create a new map object.',
            'icon' => 'fa fa-globe',
            'scripts-admin' => array(
                'gmaps-admin-script' => objects_url() . 'gmaps/gmaps.admin.js'
            ),
            'styles' => array(
            ),
            'scripts' => array(
                'gmaps-script' => 'http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7',
                'maplace-script' => objects_url() . 'gmaps/gmaps.plugin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/gmaps/preview.jpg" alt="GMaps" />',
            'keywords' => 'gmaps, bootstrap, important, notification, notice',
            'filter' => '*',
            'order' => 30
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
            'lat' => array(
                'title' => 'Latitude',
                'description' => 'Input the location latitude coordinate.',
                'type' => 'text',
                'default' => '45.745681',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'lon' => array(
                'title' => 'Longitude',
                'description' => 'Input the location longitude coordinate.',
                'type' => 'text',
                'default' => '21.242734',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'zoom' => array(
                'title' => 'Zoom',
                'description' => 'Choose the starting zoom in of the map.',
                'type' => 'text',
                'default' => '13',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'height' => array(
                'title' => 'Height',
                'description' => 'Choose the height of the map in pixels.',
                'type' => 'text',
                'default' => '300px',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Input an unique ID for the gmaps.',
                'type' => 'id',
                'default' => 'gmaps',
                'category' => null,
                'values' => null,
                'required' => true
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the form submit button object. Classes should be separated by a space. Example: <strong>btn-block</strong>',
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
            'id' => '',
            'lat' => '',
            'lon' => '',
            'height' => '',
            'zoom' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="maplace ' . $classes . '"'
                . ' id="' . $id . '"'
                . ' data-lat="' . $lat . '"'
                . ' data-lon="' . $lon . '"'
                . ' data-zoom="' . $zoom . '"'
                . '>';
        $html .= '</div>';

        if ($id != '')
            $html .= '<style>'
                    . '#' . $id . '{'
                    . 'height: ' . $height . ';'
                    . '}'
                    . '</style>';

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
    $object = new WRGMaps();
    $webrock->add_object($object);
}
