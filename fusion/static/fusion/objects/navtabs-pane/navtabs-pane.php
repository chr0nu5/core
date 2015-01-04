<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRNavTabsPane implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'navtabs-pane';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'NavTabs Pane',
            'description' => 'Create a new navtabs pane. Each pane will be linked to by a tab.',
            'icon' => 'fa fa-square',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'navtabs-pane-admin-script' => objects_url() . 'navtabs-pane/navtabs-pane.admin.js'
            ),
            'keywords' => 'navtabs, nav, pills, tabs, pane',
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
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Input an unique ID for the navtab pane.',
                'type' => 'id',
                'default' => 'navtabs-pane',
                'category' => 'Text',
                'values' => null,
                'required' => true
            ),
            'active' => array(
                'title' => 'Active',
                'description' => 'Set the navtab pane to be active.',
                'type' => 'checkbox',
                'default' => '',
                'category' => null,
                'values' => array(
                    'active' => "Active"
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
        extract(shortcode_atts(array(
            'id' => '',
            'active' => ''
                        ), $atts));

        if ($content == null)
            $content = '<div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock is awesome!&amp;amp;nbsp;&amp;lt;&amp;#x2F;strong&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox"><p><strong>WebRock is awesome!&nbsp;</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>';

        $html = '';
        $html .= '<div class="tab-pane fade ' . ($active != '' ? $active . ' in' : '') . '" id="' . $id . '">';
        $html .= webrock_do_shortcode($content);
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
    $object = new WRNavTabsPane();
    $webrock->add_object($object);
}
