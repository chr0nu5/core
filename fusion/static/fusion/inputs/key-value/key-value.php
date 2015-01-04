<?php

/* =============================================
 * Key Value Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRKeyValueInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'key-value';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'key-value-script' => inputs_url() . 'key-value/key-value.js',
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
        if (is_array($default)) {
            foreach ($default as $key => $value)
                $html .= '<div class="webrock-kv">'
                        . '<input '
                        . 'type="text" '
                        . 'class="form-control webrock-kv-key" '
                        . 'name="' . $name . '" '
                        . 'value="' . $key . '"'
                        . '/>'
                        . '<input '
                        . 'type="text" '
                        . 'class="form-control webrock-kv-value" '
                        . 'name="' . $name . '" '
                        . 'value="' . $value . '"'
                        . '/>'
                        . '</div>';
        } else {
            $html .= '<div class="webrock-kv">'
                    . '<input '
                    . 'type="text" '
                    . 'class="form-control  webrock-kv-key" '
                    . 'name="' . $name . '" '
                    . '/>'
                    . '<input '
                    . 'type="text" '
                    . 'class="form-control  webrock-kv-value" '
                    . 'name="' . $name . '" '
                    . '/>'
                    . '</div>';
        }


        $html .= '<a href="javascript:void(0);" class="webrock-page-button webrock-key-value">Add More</a>';

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
    $input = new WRKeyValueInput();
    $webrock->add_input($input);
}
