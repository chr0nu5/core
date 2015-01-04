<?php

/* =============================================
 * Text Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRNavbarMenuInput implements WebRockInput
{
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'navbarmenu';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'scripts' => array(
                'navbarmenu-input-script' => inputs_url() . 'navbarmenu/navbarmenu.js',
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

    function create($name, $values = null, $default = null)
    {
        $html = '<input '
            . 'type="text" '
            . 'class="form-control hidden" '
            . 'name="' . $name . '" '
            . 'value="' . $default . '" '
            . '/>';

        $html .= '<input '
            . 'type="text" '
            . 'class="form-control" '
            . 'name="' . $name . '" '
            . 'placeholder="Text" '
            . '/>';
        $html .= '<input '
            . 'type="text" '
            . 'class="form-control" '
            . 'name="' . $name . '" '
            . 'placeholder="Link" '
            . '/>';
        $html .= '<div class="webrock-input-group">';
        $html .= '<input type="checkbox" name="' . $name . '" value="active"> Set as active';
        $html .= '</div>';
        $html .= '<a href="javascript:void(0);" '
            . 'class="webrock-page-button" '
            . '>'
            . 'Add Menu Item'
            . '</a>';

        $html .= '<ul class="webrock-menu-list"></ul>';

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
    $input = new WRNavbarMenuInput();
    $webrock->add_input($input);
}
