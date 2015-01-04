<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRPanel implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'panel';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Panel',
            'description' => 'Create a new panel.',
            'icon' => 'fa fa-list-alt',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'panel-admin-script' => objects_url() . 'panel/panel.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/panel/preview.jpg" alt="Panel" />',
            'keywords' => 'panel, table, content, bootstrap',
            'filter' => '*',
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
            'heading' => array(
                'title' => 'Heading',
                'description' => 'Choose the panel title.',
                'type' => 'text',
                'default' => 'Panel Heading',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'icon' => array(
                'title' => 'Icon',
                'description' => 'Choose the panel title icon.',
                'type' => 'icon',
                'default' => 'fa fa-cube',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the panel element.',
                'type' => 'radio',
                'default' => 'panel-default',
                'category' => null,
                'values' => array(
                    'panel-default' => "Default",
                    'panel-primary' => "Primary",
                    'panel-success' => "Success",
                    'panel-info' => "Info",
                    'panel-warning' => "Warning",
                    'panel-danger' => "Danger"
                ),
                'required' => false
            ),
            'footer' => array(
                'title' => 'Footer',
                'description' => 'Choose the panel footer.',
                'type' => 'text',
                'default' => 'Panel Footer',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the panel is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the panel object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
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
            'heading' => '',
            'icon' => '',
            'footer' => '',
            'type' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));
        $html = '';


        $html .= '<div class="panel ' . $classes . ' ' . $type . '" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        if ($heading != '' || $icon != '') {
            $html .= '<div class="panel-heading">';
            if ($icon != '')
                $html .= '<i class="' . $icon . ' margin-right"></i> ';
            $html .= $heading;
            $html .= '</div>';
        }

        if ($content == null)
            $content = '<div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock is awesome!&amp;amp;nbsp;&amp;lt;&amp;#x2F;strong&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox"><p><strong>WebRock is awesome!&nbsp;</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>';

        $html .= '<div class="panel-body">';
        $html .= webrock_do_shortcode($content);
        $html .= '</div>';


        if ($footer != '') {
            $html .= '<div class="panel-footer">';
            $html .= html_entity_decode($footer);
            $html .= '</div>';
        }
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
    $object = new WRPanel();
    $webrock->add_object($object);
}
