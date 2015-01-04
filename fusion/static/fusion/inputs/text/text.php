<?php

/* =============================================
 * Text Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRTextInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'text';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'text-script' => inputs_url() . 'text/text.js',
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
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . 'value="' . ($default != null ? $default : '') . '"'
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
    $input = new WRTextInput();
    $webrock->add_input($input);
}
