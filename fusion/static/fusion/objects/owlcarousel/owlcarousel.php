<?php

/* =============================================
 * Owl Carousel 
 * 
 * @type WebRock Object
 * ============================================= */

class WROwlCarousel implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'owlcarousel';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Owl Carousel',
            'description' => 'Create a new owl carousel object. The Owl Carousel is a touch enabled jQuery plugin that lets you create beautiful responsive carousel slider',
            'icon' => 'fa fa-spinner',
            'styles' => array(
                'owlcarousel-style' => objects_url() . 'owlcarousel/owlcarousel.css'
            ),
            'scripts' => array(
                'owlcarousel-script' => objects_url() . 'owlcarousel/owlcarousel.plugin.js'
            ),
            'scripts-admin' => array(
                'owlcarousel-admin-script' => objects_url() . 'owlcarousel/owlcarousel.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/owlcarousel/preview.jpg" alt="Owl Carousel" />',
            'keywords' => 'owl carousel, slide, owlcarousel',
            'filter' => array(
                'values' => 'owlcarousel-slide',
                'exclude' => false
            ),
            'order' => 9
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

    function attributes()
    {
        return array(
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Input an unique ID for the object.',
                'type' => 'id',
                'default' => 'owlcarousel',
                'category' => null,
                'values' => null,
                'required' => true
            ),
            'items' => array(
                'title' => 'Items',
                'description' => 'This variable allows you to set the maximum amount of items displayed at a time with the widest browser width.',
                'type' => 'text',
                'default' => '3',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'autoplay' => array(
                'title' => 'Autoplay',
                'description' => 'Change to any integrer, for example autoPlay : 5000 to play every 5 seconds.',
                'type' => 'text',
                'default' => '5000',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'stopOnHover' => array(
                'title' => 'Stop On Hover',
                'description' => 'Stop autoplay on mouse hover.',
                'type' => 'radio',
                'default' => 'false',
                'category' => null,
                'values' => array(
                    'true' => 'Enabled',
                    'false' => 'Disabled'
                ),
                'required' => false
            ),
            'navigation' => array(
                'title' => 'Navigation',
                'description' => "Display 'next' and 'prev' buttons.",
                'type' => 'radio',
                'default' => 'false',
                'category' => null,
                'values' => array(
                    'true' => 'Enabled',
                    'false' => 'Disabled'
                ),
                'required' => false
            ),
            'pagination' => array(
                'title' => 'Pagination',
                'description' => "Display pagination bullets.",
                'type' => 'radio',
                'default' => 'true',
                'category' => null,
                'values' => array(
                    'true' => 'Enabled',
                    'false' => 'Disabled'
                ),
                'required' => false
            ),
            'transitionStyle' => array(
                'title' => 'Transition Style',
                'description' => "Add CSS3 transition style. Works only with one item on screen.",
                'type' => 'radio',
                'default' => 'fade',
                'category' => null,
                'values' => array(
                    '' => "None",
                    'fade' => "Fade",
                    'backSlide' => "BackSlide",
                    'goDown ' => "GoDown",
                    'scaleUp' => "ScaleUp"
                ),
                'required' => false
            ),
            'classes' => array(
                'title' => 'Classes',
                'description' => 'Add more classes to your owl carousel container.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
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

    function create($atts, $content = null)
    {
        $atts = webrock_atts_decode($atts);
        extract(shortcode_atts(array(
            'id' => '',
            'items' => '',
            'autoplay' => '',
            'stopOnHover' => '',
            'navigation' => '',
            'pagination' => '',
            'transitionStyle' => '',
            'classes' => ''
        ), $atts));

        $slides = '';
        $slides .= '<div class="item webrock-object" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-fullwidth&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image-1.jpg" alt="#" class="img-fullwidth img-default"></div><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; Slide #1&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> Slide #1</p></div></div></div>';
        $slides .= '<div class="item webrock-object" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-fullwidth&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image-2.jpg" alt="#" class="img-fullwidth img-default"></div><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; Slide #2&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> Slide #2</p></div></div></div>';
        $slides .= '<div class="item webrock-object" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-fullwidth&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image-3.jpg" alt="#" class="img-fullwidth img-default"></div><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; Slide #3&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> Slide #3</p></div></div></div>';
        $slides .= '<div class="item webrock-object" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-fullwidth&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image-4.jpg" alt="#" class="img-fullwidth img-default"></div><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; Slide #4&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> Slide #4</p></div></div></div>';
        $slides .= '<div class="item webrock-object" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-fullwidth&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image-5.jpg" alt="#" class="img-fullwidth img-default"></div><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; Slide #5&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> Slide #5</p></div></div></div>';
        $slides .= '<div class="item webrock-object" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><div class="img webrock-object" data-atts="{&quot;image&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image.jpg&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-fullwidth&quot;,&quot;appearance&quot;:&quot;img-default&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/image-6.jpg" alt="#" class="img-fullwidth img-default"></div><div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;WebRock&amp;lt;&amp;#x2F;strong&amp;gt; Slide #6&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><strong>WebRock</strong> Slide #6</p></div></div></div>';

        $content = $content == null ? $slides : $content;

        $html = '';
        $html .= '<div class="owl-carousel ' . $classes . '" id="' . $id . '">';
        $html .= webrock_do_shortcode($content);
        $html .= '</div>';

        if ($id != '') {
            $html .= '<script type="text/javascript" id="' . $id . '_script">';
            $html .= 'jQuery("#' . $id . '").owlCarousel({';
            if ($items != '') {
                $html .= 'items:' . $items . ',';
                if ($items == '1') {
                    $html .= 'singleItem: true,';
                }
            }
            $html .= 'autoplay: ' . $autoplay . ', ';

            $html .= 'stopOnHover: ' . $stopOnHover . ', ';

            $html .= 'pagination: ' . $pagination . ', ';

            $html .= 'navigation: ' . $navigation . ', ';

            if ($transitionStyle != '')
                $html .= 'transitionStyle: "' . $transitionStyle . '", ';

            $html .= 'navigationText:["&lt;","&gt;"],';
            $html .= 'autoHeight: true';
            $html .= '});
';
            $html .= '</script>';
        }
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
    $object = new WROwlCarousel();
    $webrock->add_object($object);
}
