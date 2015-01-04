<?php

/* =============================================
 * Text Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRButtonInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'button';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'button-script' => inputs_url() . 'button/button.js',
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
        $html = '<a href="javascript:void(0);" '
                . 'id="' . $name . '" '
                . 'class="webrock-page-button" '
                . '>'
                . ($default != null ? $default : 'Save')
                . '</a>';
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
    $input = new WRButtonInput();
    $webrock->add_input($input);
}
