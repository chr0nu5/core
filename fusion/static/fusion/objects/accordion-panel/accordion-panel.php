<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRAccordionPanel implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'accordion-panel';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Accordion Panel',
            'description' => 'Create a new accordion-panel object.',
            'icon' => 'fa fa-list-alt',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'accordion-panel-admin-script' => objects_url() . 'accordion-panel/accordion-panel.admin.js'
            ),
            'keywords' => 'accordion-panel, panel, accordion-panel panel',
            'filter' => array(
                'values' => '*',
                'exclude' => false
            ),
            'order' => 41
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
            'title' => array(
                'title' => 'Title',
                'description' => 'Choose the accordion panel title.',
                'type' => 'text',
                'default' => 'Accordion Panel',
                'category' => 'Design',
                'values' => null,
                'required' => true
            ),
            'icon' => array(
                'title' => 'Icon',
                'description' => 'Choose the accordion panel icon.',
                'type' => 'icon',
                'default' => 'fa fa-square',
                'category' => 'Design',
                'values' => null,
                'required' => true
            ),
            'active' => array(
                'title' => 'Active',
                'description' => 'Set the panel to be active by default.',
                'type' => 'checkbox',
                'default' => '',
                'category' => 'Design',
                'values' => array(
                    'active' => 'Active'
                ),
                'required' => true
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the panel element.',
                'type' => 'radio',
                'default' => 'panel-default',
                'category' => 'Design',
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
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose an animation for the panel.',
                'type' => 'animation',
                'default' => null,
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'parentid' => array(
                'title' => 'Parent ID',
                'description' => 'Input an unique ID for the object.',
                'type' => 'text',
                'default' => '',
                'category' => 'Settings',
                'values' => null,
                'required' => true
            ),
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Input an unique ID for the object.',
                'type' => 'id',
                'default' => 'accordion-panel',
                'category' => 'Settings',
                'values' => null,
                'required' => true
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the accordion object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => 'Settings',
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
            'id' => '',
            'parentid' => '',
            'title' => '',
            'icon' => '',
            'active' => '',
            'type' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="panel ' . $classes . ' ' . $type . '" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';

        $html .= '<div class="panel-heading">';
        $html .= '<h4 class="panel-title">';
        $html .= '<a data-toggle="collapse" data-parent="#' . $parentid . '" href="#' . $id . '">';
        $html .= '<i class="' . $icon . '"></i> ' . $title;
        $html .= '</a>';
        $html .= '</h4>';
        $html .= '</div>';

        $html .= '<div id="' . $id . '" class="panel-collapse collapse ' . ($active == 'active' ? 'in' : '') . '">';
        $html .= '<div class="panel-body">';

        $dummy = '<div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;&amp;#x2F;strong&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*">Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></div>';
        $content = $content == null ? $dummy : $content;

        $html .= webrock_do_shortcode($content);
        $html .= '</div>';
        $html .= '</div>';

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
    $object = new WRAccordionPanel();
    $webrock->add_object($object);
}
