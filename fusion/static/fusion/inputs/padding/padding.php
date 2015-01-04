<?php

/* =============================================
 * Padding Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRPaddingInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'padding';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'padding-script' => inputs_url() . 'padding/padding.js',
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

        $html .= '<div class="webrock-padding-wrapper">';
        $html .= '<div class="webrock-padding">';

        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-padding-top" '
                . '/>';
        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-padding-right" '
                . '/>';
        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-padding-left" '
                . '/>';
        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-padding-bottom" '
                . '/>';

        $html .= '</div>';
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
    $input = new WRPaddingInput();
    $webrock->add_input($input);
}
