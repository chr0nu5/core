<?php

/* =============================================
 * Grid Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRGridInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'grid';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'grid-input-script' => inputs_url() . 'grid/grid.js',
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
        // 12
        $html .= '<div data-value="12" class="webrock-row row">'
                . '<div class="col-xs-12 text-center">12</div>'
                . '</div>';
        // 9/3
        $html .= '<div data-value="9/3" class="webrock-row row">'
                . '<div class="col-xs-9 text-center">9</div>'
                . '<div class="col-xs-3 text-center">3</div>'
                . '</div>';
        // 8/4
        $html .= '<div data-value="8/4" class="webrock-row row">'
                . '<div class="col-xs-8 text-center">8</div>'
                . '<div class="col-xs-4 text-center">4</div>'
                . '</div>';
        // 6/6
        $html .= '<div data-value="6/6" class="webrock-row row">'
                . '<div class="col-xs-6 text-center">6</div>'
                . '<div class="col-xs-6 text-center">6</div>'
                . '</div>';
        // 4/4/4
        $html .= '<div data-value="4/4/4" class="webrock-row row">'
                . '<div class="col-xs-4 text-center">4</div>'
                . '<div class="col-xs-4 text-center">4</div>'
                . '<div class="col-xs-4 text-center">4</div>'
                . '</div>';
        // 3/3/3/3
        $html .= '<div data-value="3/3/3/3" class="webrock-row row">'
                . '<div class="col-xs-3 text-center">3</div>'
                . '<div class="col-xs-3 text-center">3</div>'
                . '<div class="col-xs-3 text-center">3</div>'
                . '<div class="col-xs-3 text-center">3</div>'
                . '</div>';

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
    $input = new WRGridInput();
    $webrock->add_input($input);
}
