<?php

/* =============================================
 * Select Multiple Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRSelectMultipleInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'select-multiple';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'select-multiple-script' => inputs_url() . 'select-multiple/select-multiple.js',
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
        $html = '<select multiple '
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . '>';

        $default = explode(',', $default);

        foreach ($values as $value => $title) {
            $html .= '<option value="' . $value . '" ' . (in_array($value, $default) ? 'selected="selected"' : '') . '>' . $title . '</option>';
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
    $input = new WRSelectMultipleInput();
    $webrock->add_input($input);
}
