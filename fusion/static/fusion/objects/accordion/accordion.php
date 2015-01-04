<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRAccordion implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'accordion';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Accordion',
            'description' => 'Create a new accordion object.',
            'icon' => 'fa fa-list-alt',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'accordion-admin-script' => objects_url() . 'accordion/accordion.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/accordion/preview.jpg" alt="Accordion" />',
            'keywords' => 'accordion, panel, accordion panel',
            'filter' => array(
                'values' => 'accordion-panel',
                'exclude' => false
            ),
            'order' => 18
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
                'description' => 'Input an unique ID for the object.',
                'type' => 'id',
                'default' => 'accordion',
                'category' => 'Text',
                'values' => null,
                'required' => true
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
            'id' => ''
                        ), $atts));

        $panelid[0] = rand(0, 1000);
        $panelid[1] = $panelid[0] + 1;
        $panelid[2] = $panelid[0] + 2;

        if ($id != '') {
            $panels = '';
            $panels .= '<div class="panel panel-default webrock-object ui-sortable" data-atts="{&quot;title&quot;:&quot;Accordion Panel&quot;,&quot;icon&quot;:&quot;fa fa-square&quot;,&quot;active&quot;:&quot;active&quot;,&quot;type&quot;:&quot;panel-default&quot;,&quot;animation&quot;:&quot;&quot;,&quot;parentid&quot;:&quot;' . $id . '&quot;,&quot;id&quot;:&quot;accordion-panel-' . $panelid[0] . '&quot;}" data-shortcode="accordion-panel" data-filter="*" data-filter-exclude=""><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#' . $id . '" href="#accordion-panel-' . $panelid[0] . '"><i class="fa fa-square"></i> Accordion Panel</a></h4></div><div id="accordion-panel-' . $panelid[0] . '" class="panel-collapse collapse in"><div class="panel-body"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;&amp;#x2F;strong&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*">Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></div></div></div></div></div>';
            $panels .= '<div class="panel panel-default webrock-object ui-sortable" data-atts="{&quot;title&quot;:&quot;Accordion Panel&quot;,&quot;icon&quot;:&quot;fa fa-square&quot;,&quot;active&quot;:&quot;&quot;,&quot;type&quot;:&quot;panel-default&quot;,&quot;animation&quot;:&quot;&quot;,&quot;parentid&quot;:&quot;' . $id . '&quot;,&quot;id&quot;:&quot;accordion-panel-' . $panelid[1] . '&quot;}" data-shortcode="accordion-panel" data-filter="*" data-filter-exclude=""><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#' . $id . '" href="#accordion-panel-' . $panelid[1] . '"><i class="fa fa-square"></i> Accordion Panel</a></h4></div><div id="accordion-panel-' . $panelid[1] . '" class="panel-collapse collapse "><div class="panel-body"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;&amp;#x2F;strong&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*">Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></div></div></div></div></div>';
            $panels .= '<div class="panel panel-default webrock-object ui-sortable" data-atts="{&quot;title&quot;:&quot;Accordion Panel&quot;,&quot;icon&quot;:&quot;fa fa-square&quot;,&quot;active&quot;:&quot;&quot;,&quot;type&quot;:&quot;panel-default&quot;,&quot;animation&quot;:&quot;&quot;,&quot;parentid&quot;:&quot;' . $id . '&quot;,&quot;id&quot;:&quot;accordion-panel-' . $panelid[2] . '&quot;}" data-shortcode="accordion-panel" data-filter="*" data-filter-exclude=""><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#' . $id . '" href="#accordion-panel-' . $panelid[2] . '"><i class="fa fa-square"></i> Accordion Panel</a></h4></div><div id="accordion-panel-' . $panelid[2] . '" class="panel-collapse collapse "><div class="panel-body"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;&amp;#x2F;strong&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*">Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></div></div></div></div></div>';

            $content = $content == null ? $panels : $content;
        }

        $html = '';
        $html .= '<div class="panel-group accordion" id="' . $id . '">';
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
    $object = new WRAccordion();
    $webrock->add_object($object);
}
