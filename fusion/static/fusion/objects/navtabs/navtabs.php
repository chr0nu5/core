<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRNavTabs implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'navtabs';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'NavTabs',
            'description' => 'Create a new navtabs object.',
            'icon' => 'fa fa-ellipsis-h',
            'styles' => array(
                'navtabs-style' => objects_url() . 'navtabs/navtabs.css'
            ),
            'scripts' => array(
            ),
            'preview' => '<img src="' . objects_url() . '/navtabs/preview.jpg" alt="Nav Tabs" />',
            'scripts-admin' => array(
                'navtabs-admin-script' => objects_url() . 'navtabs/navtabs.admin.js'
            ),
            'keywords' => 'navtabs, nav, pills, tabs, pane',
            'filter' => array(
                'values' => 'navtabs-pane, navtabs-tabs',
                'exclude' => false
            ),
            'order' => 19
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
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the navtabs type.',
                'type' => 'radio',
                'default' => 'tabs-default',
                'category' => null,
                'values' => array(
                    'tabs-default' => "Top",
                    'tabs-below' => "Bottom",
                    'tabs-left' => "Left",
                    'tabs-right' => "Right"
                ),
                'required' => false
            ),
            'theme' => array(
                'title' => 'Theme',
                'description' => 'Choose the navtabs theme.',
                'type' => 'radio',
                'default' => 'tabbable-default',
                'category' => null,
                'values' => array(
                    'tabbable-transparent' => "Transparent",
                    'tabbable-default' => "Default",
                    'tabbable-inverse' => "Inverse"
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
        extract(webrock_atts($this->attributes(), $atts));

        $id[0] = rand(0, 1000);
        $id[1] = $id[0] + 1;
        $id[2] = $id[0] + 2;

        $navtabs_tabs = '<div class="webrock-object" data-atts="{&quot;tabs&quot;:&quot;{&amp;quot;Tab 1&amp;quot;:&amp;quot;#navtabs-pane-' . $id[0] .  '&amp;quot;,&amp;quot;Tab 2&amp;quot;:&amp;quot;#navtabs-pane-' . $id[1] .  '&amp;quot;,&amp;quot;Tab 3&amp;quot;:&amp;quot;#navtabs-pane-' . $id[2] .  '&amp;quot;}&quot;,&quot;active&quot;:&quot;1&quot;}" data-shortcode="navtabs-tabs"><ul class="nav nav-tabs"><li class="active"><a href="#navtabs-pane-' . $id[0] .  '" data-toggle="tab">Tab 1</a></li><li><a href="#navtabs-pane-' . $id[1] .  '" data-toggle="tab">Tab 2</a></li><li><a href="#navtabs-pane-' . $id[2] .  '" data-toggle="tab">Tab 3</a></li></ul></div>';

        $navtabs_pane = '<div class="tab-content">'
                . '<div class="tab-pane fade active in webrock-object" id="navtabs-pane-' . $id[0] .  '" data-atts="{&quot;id&quot;:&quot;navtabs-pane-' . $id[0] .  '&quot;,&quot;active&quot;:&quot;active&quot;}" data-shortcode="navtabs-pane"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;#1 WebRock is awesome!&amp;amp;nbsp;&amp;lt;&amp;#x2F;strong&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox"><p><strong>#1 WebRock is awesome!&nbsp;</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div></div></div>'
                . '<div class="tab-pane fade webrock-object" id="navtabs-pane-' . $id[1] .  '" data-atts="{&quot;id&quot;:&quot;navtabs-pane-' . $id[1] .  '&quot;,&quot;active&quot;:&quot;&quot;}" data-shortcode="navtabs-pane"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;#2 WebRock is awesome!&amp;amp;nbsp;&amp;lt;&amp;#x2F;strong&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox"><p><strong>#2 WebRock is awesome!&nbsp;</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div></div></div>'
                . '<div class="tab-pane fade webrock-object" id="navtabs-pane-' . $id[2] .  '" data-atts="{&quot;id&quot;:&quot;navtabs-pane-' . $id[2] .  '&quot;,&quot;active&quot;:&quot;&quot;}" data-shortcode="navtabs-pane"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;#3 WebRock is awesome!&amp;amp;nbsp;&amp;lt;&amp;#x2F;strong&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox"><p><strong>#3 WebRock is awesome!&nbsp;</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div></div></div>'
                . '</div>';

        $navtabs = $navtabs_tabs . $navtabs_pane;


        $content = $content == null ? $navtabs : $content;

        $html = '';
        $html .= '<div class="tabbable '.$theme.' ' . $type . '">';
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
    $object = new WRNavTabs();
    $webrock->add_object($object);
}
