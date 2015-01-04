<?php

/* =============================================
 * Text Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRSeparatorInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'separator';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'separator-admin-script' => inputs_url() . 'separator/separator.js',
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
        $html = '';
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
    $input = new WRSeparatorInput();
    $webrock->add_input($input);
}
