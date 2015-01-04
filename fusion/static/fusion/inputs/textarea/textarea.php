<?php

/* =============================================
 * Textarea Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRTextareaInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'textarea';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'textarea-script' => inputs_url() . 'textarea/textarea.js',
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
    $input = new WRTextareaInput();
    $webrock->add_input($input);
}
