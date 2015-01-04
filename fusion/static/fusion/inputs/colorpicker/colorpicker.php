<?php

/* =============================================
 * ColorPicker Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRColorPicker implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'colorpicker';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'styles' => array(
                'colorpicker-style' => inputs_url() . 'colorpicker/colorpicker.css'
            ),
            'scripts' => array(
                'colorpicker-plugin' => inputs_url() . 'colorpicker/colorpicker.plugin.js',
                'colorpicker-script' => inputs_url() . 'colorpicker/colorpicker.js'
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
                . 'class="webrock-colorpicker" '
                . 'type="color" '
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
    $input = new WRColorPicker();
    $webrock->add_input($input);
}
