<?php

/* =============================================
 * Radio Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRRadioInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'radio';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'radio-script' => inputs_url() . 'radio/radio.js',
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
        foreach ($values as $value => $title) {
            $html .= '<div class="webrock-input-group">';
            $html .= '<label><input type="radio" name="' . $name . '" value="' . $value . '" ' . ($default == $value ? 'data-checked="1" checked' : 'data-checked="0"') . '>' . $title . '</label>';
            $html .= '</div>';
        }
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
    $input = new WRRadioInput();
    $webrock->add_input($input);
}
