<?php

/* =============================================
 * Text Repeater Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRTextRepeaterInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'text-repeater';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'text-repeater-script' => inputs_url() . 'text-repeater/text-repeater.js',
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
            foreach ($default as $input)
                $html .= '<input '
                        . 'type="text" '
                        . 'class="form-control" '
                        . 'name="' . $name . '" '
                        . 'value="' . $input . '"'
                        . '/>';
        } else {
            $html .= '<input '
                    . 'type="text" '
                    . 'class="form-control" '
                    . 'name="' . $name . '" '
                    . '/>';
        }


        $html .= '<a href="javascript:void(0);" class="webrock-page-button webrock-text-repeater">Add More</a>';

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
    $input = new WRTextRepeaterInput();
    $webrock->add_input($input);
}
