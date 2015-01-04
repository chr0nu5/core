<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WROwlCarouselSlide implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'owlcarousel-slide';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Owl Carousel Slide',
            'description' => 'Create a new owl carousel slide.',
            'scripts-admin' => array(
                'owlcarousel-slide-admin-script' => objects_url() . 'owlcarousel-slide/owlcarousel-slide.admin.js'
            ),
            'icon' => 'fa fa-circle',
            'keywords' => 'owl carousel, slide, owlcarousel-slide',
            'filter' => array(
                'values' => '*',
                'exclude' => false
            ),
            'order' => 26
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

        $dummy = '<div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-responsive&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image.jpg" alt="#" class="img-responsive img-default"></div>';
        $dummy .= '<div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; OwlCarousel Slide&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> OwlCarousel Slide</p></div>';
        $content = $content == null ? $dummy : $content;

        $html = '';
        $html .= '<div class="item">';
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
    $object = new WROwlCarouselSlide();
    $webrock->add_object($object);
}
