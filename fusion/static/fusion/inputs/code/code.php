<?php

/* =============================================
 * WYSIWYG Input
 * 
 * @type WebRock Input
 * ============================================= */

class WRCode implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'code';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'styles' => array(
                'code-style' => inputs_url() . 'code/code.css'
            ),
            'scripts' => array(
                'code-plugin' => inputs_url() . 'code/code.plugin.js',
                'code-script' => inputs_url() . 'code/code.js'
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
        $html = '<textarea '
                . 'rows="5" '
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . '>'
                . ($default != null ? $default : '')
                . '</textarea>';
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
    $input = new WRCode();
    $webrock->add_input($input);
}
