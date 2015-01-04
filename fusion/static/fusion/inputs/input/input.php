<?php

/* =============================================
 * Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRInput implements WebRockInput{
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'input';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'styles' => array(
                'input-style' => inputs_url() . 'input/input.css'
            ),
            'scripts' => array(
                'input-script' => inputs_url() . 'input/input.js',
                'input-plugin-name' => inputs_url() . 'input/input.plugin.js'
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
    $input = new WRInput();
    $webrock->add_input($input);
}
