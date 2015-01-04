<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRServiceBlock1 implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'service-block';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Service Block',
            'description' => 'Create a new service block.',
            'icon' => 'fa fa-briefcase',
            'preview' => '<img src="' . objects_url() . '/service-block/preview.jpg" alt="Service" />',
            'keywords' => 'service, services, block, service block',
            'filter' => '*',
            'order' => 4
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
        return array();
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
        extract(webrock_atts($this->attributes(), $atts));
        $html = '';

        
        $random = rand(10, 500);
        
        $html .= '<div class="imagebackground  webrock-object ui-sortable" id="imagebackground-' . $random . '" data-atts="{&quot;backgroundsolid&quot;:&quot;#ddd4ce&quot;,&quot;backgroundimage&quot;:&quot;&quot;,&quot;backgroundtype&quot;:&quot;cover&quot;,&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;id&quot;:&quot;imagebackground-' . $random . '&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="imagebackground" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="grid webrock-object" data-atts="{&quot;grid&quot;:&quot;4/4/4&quot;,&quot;container&quot;:&quot;1&quot;}" data-shortcode="grid" data-filter="*" data-filter-exclude="*"><div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="service-1 service-border-3  service-transparent service webrock-object" data-atts="{&quot;style&quot;:&quot;service-1&quot;,&quot;border&quot;:&quot;service-border-3&quot;,&quot;icon&quot;:&quot;fa fa-pencil&quot;,&quot;iconsize&quot;:&quot;4x&quot;,&quot;title&quot;:&quot;WEB DESIGN&quot;,&quot;titlesize&quot;:&quot;h4&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;service-transparent&quot;,&quot;readmore&quot;:&quot;Read More&quot;,&quot;readmorelink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="service" data-filter="*" data-filter-exclude="*"><i class="fa-4x service-icon fa fa-pencil"></i> <h4 class="service-title text-heading-bold">WEB DESIGN</h4><div class="service-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p></div><a class="service-link" href="#">Read More <i class="fa fa-caret-right"></i></a></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="service-1 service-border-3  service-transparent service webrock-object" data-atts="{&quot;style&quot;:&quot;service-1&quot;,&quot;border&quot;:&quot;service-border-3&quot;,&quot;icon&quot;:&quot;fa fa-code&quot;,&quot;iconsize&quot;:&quot;4x&quot;,&quot;title&quot;:&quot;DEVELOPMENT&quot;,&quot;titlesize&quot;:&quot;h4&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;service-transparent&quot;,&quot;readmore&quot;:&quot;Read More&quot;,&quot;readmorelink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="service" data-filter="*" data-filter-exclude="*"><i class="fa-4x service-icon fa fa-code"></i> <h4 class="service-title text-heading-bold">DEVELOPMENT</h4><div class="service-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p></div><a class="service-link" href="#">Read More <i class="fa fa-caret-right"></i></a></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="service-1 service-border-3  service-transparent service webrock-object" data-atts="{&quot;style&quot;:&quot;service-1&quot;,&quot;border&quot;:&quot;service-border-3&quot;,&quot;icon&quot;:&quot;fa fa-cog&quot;,&quot;iconsize&quot;:&quot;4x&quot;,&quot;title&quot;:&quot;CUSTOMIZATION&quot;,&quot;titlesize&quot;:&quot;h4&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;service-transparent&quot;,&quot;readmore&quot;:&quot;Read More&quot;,&quot;readmorelink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="service" data-filter="*" data-filter-exclude="*"><i class="fa-4x service-icon fa fa-cog"></i> <h4 class="service-title text-heading-bold">CUSTOMIZATION</h4><div class="service-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p></div><a class="service-link" href="#">Read More <i class="fa fa-caret-right"></i></a></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="service-1 service-border-3  service-transparent service webrock-object" data-atts="{&quot;style&quot;:&quot;service-1&quot;,&quot;border&quot;:&quot;service-border-3&quot;,&quot;icon&quot;:&quot;fa fa-cube&quot;,&quot;iconsize&quot;:&quot;4x&quot;,&quot;title&quot;:&quot;PAGE  BUILDER&quot;,&quot;titlesize&quot;:&quot;h4&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;service-transparent&quot;,&quot;readmore&quot;:&quot;Try Now&quot;,&quot;readmorelink&quot;:&quot;http://grozav.com/build/WebRock/index.php?demo=1&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="service" data-filter="*" data-filter-exclude="*"><i class="fa-4x service-icon fa fa-cube"></i> <h4 class="service-title text-heading-bold">PAGE  BUILDER</h4><div class="service-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p></div><a class="service-link" href="http://grozav.com/build/WebRock/index.php?demo=1">Try Now <i class="fa fa-caret-right"></i></a></div></div></div></div></div></div></div></div></div></div>';
        $html .= '<style>#imagebackground-' . $random . '{background-color: #ddd4ce;}</style>';

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
    $object = new WRServiceBlock1();
    $webrock->add_object($object);
}
