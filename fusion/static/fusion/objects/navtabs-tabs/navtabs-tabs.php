<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRNavTabsTabs implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'navtabs-tabs';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'NavTabs Tabs',
            'description' => 'Create a new navtabs tabs. Each tab must link to an existing pane.',
            'icon' => 'fa fa-ellipsis-h',
            'preview' => '<img src="' . objects_url() . '/navtabs/preview.jpg" alt="Navtabs" />',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'navtabs-tabs-admin-script' => objects_url() . 'navtabs-tabs/navtabs-tabs.admin.js'
            ),
            'keywords' => 'navtabs, nav, pills, tabs, tab',
            'filter' => '*',
            'order' => 40
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
            'tabs' => array(
                'title' => 'Tabs',
                'description' => 'Choose the links between tabs and panes. First column represents the tab title and the second column represents the tab id.',
                'type' => 'key-value',
                'default' => array(
                    'Tab 1' => '#pane1',
                    'Tab 2' => '#pane2',
                    'Tab 3' => '#pane3'
                ),
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'active' => array(
                'title' => 'Active',
                'description' => 'Choose the index of the active tab.',
                'type' => 'text',
                'default' => '1',
                'category' => null,
                'values' => null,
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
        extract(shortcode_atts(array(
            'tabs' => '',
            'active' => '',
                        ), $atts));
        $html = '';
        $html .= '<div>';
        $html .= '<ul class="nav nav-tabs">';

        $i = 1;
        $tabs = json_decode(html_entity_decode($tabs), true);
        foreach ($tabs as $key => $value) {
            $html .= '<li';
            if ($i == $active) {
                $html .= ' class="active"';
                $i++;
            }
            $html .= '>';
            $html .= '<a href="' . $value . '" data-toggle="tab">' . $key . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
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
    $object = new WRNavTabsTabs();
    $webrock->add_object($object);
}
