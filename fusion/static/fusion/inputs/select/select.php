<?php

/* =============================================
 * Select Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRSelectInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'select';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'select-script' => inputs_url() . 'select/select.js',
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
        $html = '<select '
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . '>';

        foreach ($values as $value => $title) {
            $html .= '<option value="' . $value . '" ' . ($default == $value ? 'selected="selected"' : '') . '>' . $title . '</option>';
        }
        $html .= '</select>';
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
    $input = new WRSelectInput();
    $webrock->add_input($input);
}
