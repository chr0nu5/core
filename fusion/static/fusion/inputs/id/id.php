<?php

/* =============================================
 * ID Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRIDInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'id';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'id-script' => inputs_url() . 'id/id.js',
            )
        );
    }

    /* ===
     * Generate
     * 
     * @role function used to generate
     *       the actual object html
     * 
     * @atts {array}
     * @content {string}
     * 
     * @return {string}
     * === */

    function create($name, $values = null, $default = null) {
        $html = '<input '
                . 'type="text" '
                . 'data-object-id="' . $default . '" '
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . '/>';
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
    $input = new WRIDInput();
    $webrock->add_input($input);
}
