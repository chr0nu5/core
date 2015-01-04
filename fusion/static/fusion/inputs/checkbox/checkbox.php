<?php

/* =============================================
 * Checkbox Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRCheckboxInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'checkbox';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'checkbox-script' => inputs_url() . 'checkbox/checkbox.js',
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
        $default = explode(',', $default);
        $html = '';
        foreach ($values as $value => $title) {
            $html .= '<div class="webrock-input-group">';
            $html .= '<label><input type="checkbox" name="' . $name . '" value="' . $value . '" ' . (in_array($value, $default) ? 'checked' : '') . '>' . $title . '</label>';
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
    $input = new WRCheckboxInput();
    $webrock->add_input($input);
}
