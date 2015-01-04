<?php

/* =============================================
 * Margin Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRMarginInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'margin';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'margin-script' => inputs_url() . 'margin/margin.js',
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

        $html .= '<div class="webrock-margin-wrapper">';
        $html .= '<div class="webrock-margin">';

        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-margin-top" '
                . '/>';
        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-margin-right" '
                . '/>';
        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-margin-left" '
                . '/>';
        $html .= '<input '
                . 'type="text" '
                . 'class="webrock-margin-bottom" '
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
    $input = new WRMarginInput();
    $webrock->add_input($input);
}
