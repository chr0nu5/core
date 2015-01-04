<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRGrid implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'grid';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Responsive Grid',
            'description' => 'Create a new bootstrap Grid. You can choose whether the grid will be put inside a bootstrap container or not.',
            'icon' => 'fa fa-th',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'preview' => '<img src="' . objects_url() . '/grid/preview.jpg" alt="Grid" />',
            'scripts-admin' => array(
                'grid-admin-script' => objects_url() . 'grid/grid.admin.js'
            ),
            'keywords' => 'grid, bootstrap, column, row',
            'filter' => '*',
            'order' => 0
        );
    }

    /* ===
     * Attributes
     * 
     * @role returns the object attributes
     *       as an array
     * @used to create inputs of chosen type and
     *       generate the object creation form
     * === */

    function attributes() {
        return array(
            'grid' => array(
                'title' => 'Layout',
                'description' => 'Choose the grid layout you want to add.',
                'type' => 'grid',
                'default' => '4/4/4',
                'category' => null,
                'values' => null,
                'required' => true
            ),
            'container' => array(
                'title' => 'Container',
                'description' => 'Choose whether the grid layout will be put inside a bootstrap container or not.',
                'type' => 'radio',
                'default' => true,
                'category' => null,
                'values' => array(
                    true => 'Enable',
                    false => 'Disable'
                ),
                'required' => false
            )
        );
    }

    /* ===
     * Create
     * 
     * @role function used to generate
     *       the actual object html
     * 
     * @atts {array}
     * @content {string}
     * 
     * @return {string}
     * 
     * @code snippets
     * Animation
     * ' . ($animation != '' ? ' data-animate="' . $animation . '"' : '') . ' 
     * Icons
     * '<i class="' . $icon . '"></i>'
     * 
     * === */

    function create($atts, $content = null) {
        $atts = webrock_atts_decode($atts);
        extract(shortcode_atts($this->attributes(), $atts));


        $grid = explode('/', html_entity_decode($grid));

        $html = '<div class="grid">';

        if ($container == true)
            $html .= '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*">'
                    . '<div class="webrock-content">';

        $html .= '<div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;">'
                . '<div class="webrock-content">';
        foreach ($grid as $col) {
            $html .= '<div class="col col-md-' . $col . ' webrock-object" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-' . $col . '&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column"><div class="webrock-content"></div></div>';
        }
        $html .= '</div>'
                . '</div>';

        if ($container == true)
            $html .= '</div>'
                    . '</div>';
        
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
    $object = new WRGrid();
    $webrock->add_object($object);
}
