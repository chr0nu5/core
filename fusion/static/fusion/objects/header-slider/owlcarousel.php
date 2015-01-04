<?php

/* =============================================
 * Owl Carousel 
 * 
 * @type WebRock Object
 * ============================================= */

class WRHeaderSlider implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'header-slider';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Header Slider',
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
            'preview' => '<img src="' . objects_url() . '/header-slider/preview.jpg" alt="Header Slider" />',
            'keywords' => 'header carousel, slider, carousel, slide, header',
            'filter' => array(
                'values' => 'owlcarousel-slide',
                'exclude' => false
            ),
            'order' => 1.8
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
        extract(shortcode_atts(array(), $atts));

        $id1 = rand(0, 1000);

        $html = '';
        $html .= '<div class="owl-carousel owl-header webrock-object ui-sortable" id="owlcarousel-'.$id1.'" data-atts="{&quot;id&quot;:&quot;owlcarousel-'.$id1.'&quot;,&quot;items&quot;:&quot;1&quot;,&quot;autoplay&quot;:&quot;5000&quot;,&quot;stopOnHover&quot;:&quot;false&quot;,&quot;navigation&quot;:&quot;true&quot;,&quot;pagination&quot;:&quot;true&quot;,&quot;transitionStyle&quot;:&quot;scaleUp&quot;,&quot;classes&quot;:&quot;owl-header&quot;}" data-shortcode="owlcarousel" data-filter="owlcarousel-slide" data-filter-exclude=""><div class="webrock-content"><div class="item webrock-object ui-sortable" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><header class="header  header-xlg header-inverse parallax webrock-object ui-sortable" id="header-'.$id1.'" data-atts="{&quot;size&quot;:&quot;header-xlg&quot;,&quot;theme&quot;:&quot;header-inverse&quot;,&quot;background_solid&quot;:&quot;#000000&quot;,&quot;background_image&quot;:&quot;img/default/header.jpg&quot;,&quot;background_type&quot;:&quot;parallax&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;header-'.$id1.'&quot;}" data-shortcode="header" data-filter="*" data-filter-exclude="*"><div class="container"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col col-xs-12 col-sm-10 col-md-8 col-lg-6  webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;col-xs-12&quot;,&quot;sm&quot;:&quot;col-sm-10&quot;,&quot;md&quot;:&quot;col-md-8&quot;,&quot;lg&quot;:&quot;col-lg-6&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="webrock-object" data-atts="{&quot;text&quot;:&quot;Try the Page Builder&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-pacifico&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading   text-pacifico">Try the Page Builder</h1></div><div class="webrock-object" data-atts="{&quot;text&quot;:&quot;WebRock&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;heading-lg&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;heading-5&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading heading-lg heading-5 text-heading-bold">WebRock</h1></div><div class="textbox text-white  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;Create an amazing website with drag and drop using the most awesome page builder made&amp;amp;nbsp;by Grozav. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ffffff&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p>Create an amazing website with drag and drop using the most awesome page builder made&nbsp;by Grozav. <strong>Rock the web!</strong></p></div></div></div></div></div><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-4 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-4&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><a class="btn btn-bordered btn-md btn-default btn-block webrock-object" href="http://grozav.com/build/WebRock/index.php?demo=1" data-atts="{&quot;text&quot;:&quot;GET STARTED&quot;,&quot;href&quot;:&quot;http://grozav.com/build/WebRock/index.php?demo=1&quot;,&quot;type&quot;:&quot;btn-default&quot;,&quot;style&quot;:&quot;btn btn-bordered&quot;,&quot;size&quot;:&quot;btn-md&quot;,&quot;classes&quot;:&quot;btn-block&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="button" data-filter="*" data-filter-exclude="*">GET STARTED</a></div></div></div></div></div></div></header></div></div><div class="item webrock-object ui-sortable" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><header class="header  header-xlg header-inverse parallax webrock-object ui-sortable" id="header-'.$id1.'3" data-atts="{&quot;size&quot;:&quot;header-xlg&quot;,&quot;theme&quot;:&quot;header-inverse&quot;,&quot;background_solid&quot;:&quot;#000000&quot;,&quot;background_image&quot;:&quot;img/default/header.jpg&quot;,&quot;background_type&quot;:&quot;parallax&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;header-'.$id1.'3&quot;}" data-shortcode="header" data-filter="*" data-filter-exclude="*"><div class="container"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col col-xs-12 col-sm-10 col-md-8 col-lg-6  webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;col-xs-12&quot;,&quot;sm&quot;:&quot;col-sm-10&quot;,&quot;md&quot;:&quot;col-md-8&quot;,&quot;lg&quot;:&quot;col-lg-6&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="webrock-object" data-atts="{&quot;text&quot;:&quot;Websites in minutes&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-pacifico&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading   text-pacifico">Websites in minutes</h1></div><div class="webrock-object" data-atts="{&quot;text&quot;:&quot;WebRock&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;heading-lg&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;heading-5&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading heading-lg heading-5 text-heading-bold">WebRock</h1></div><div class="textbox text-white  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;Create an amazing website with drag and drop using the most awesome page builder made&amp;amp;nbsp;by Grozav. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ffffff&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p>Create an amazing website with drag and drop using the most awesome page builder made&nbsp;by Grozav. <strong>Rock the web!</strong></p></div></div></div></div></div><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-4 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-4&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><a class="btn btn-bordered btn-md btn-default btn-block webrock-object" href="http://grozav.com/build/WebRock/index.php?demo=1" data-atts="{&quot;text&quot;:&quot;GET STARTED&quot;,&quot;href&quot;:&quot;http://grozav.com/build/WebRock/index.php?demo=1&quot;,&quot;type&quot;:&quot;btn-default&quot;,&quot;style&quot;:&quot;btn btn-bordered&quot;,&quot;size&quot;:&quot;btn-md&quot;,&quot;classes&quot;:&quot;btn-block&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="button" data-filter="*" data-filter-exclude="*">GET STARTED</a></div></div></div></div></div></div></header></div></div><div class="item webrock-object ui-sortable" data-atts="{}" data-shortcode="owlcarousel-slide" data-filter="*" data-filter-exclude=""><div class="webrock-content"><header class="header  header-xlg header-inverse parallax webrock-object ui-sortable" id="header-'.$id1.'6" data-atts="{&quot;size&quot;:&quot;header-xlg&quot;,&quot;theme&quot;:&quot;header-inverse&quot;,&quot;background_solid&quot;:&quot;#000000&quot;,&quot;background_image&quot;:&quot;img/default/header.jpg&quot;,&quot;background_type&quot;:&quot;parallax&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;header-'.$id1.'6&quot;}" data-shortcode="header" data-filter="*" data-filter-exclude="*"><div class="container"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col col-xs-12 col-sm-10 col-md-8 col-lg-6  webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;col-xs-12&quot;,&quot;sm&quot;:&quot;col-sm-10&quot;,&quot;md&quot;:&quot;col-md-8&quot;,&quot;lg&quot;:&quot;col-lg-6&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="webrock-object" data-atts="{&quot;text&quot;:&quot;Unlimited creativity&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-pacifico&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading   text-pacifico">Unlimited creativity</h1></div><div class="webrock-object" data-atts="{&quot;text&quot;:&quot;WebRock&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;heading-lg&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;heading-5&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading heading-lg heading-5 text-heading-bold">WebRock</h1></div><div class="textbox text-white  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;Create an amazing website with drag and drop using the most awesome page builder made&amp;amp;nbsp;by Grozav. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ffffff&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p>Create an amazing website with drag and drop using the most awesome page builder made&nbsp;by Grozav. <strong>Rock the web!</strong></p></div></div></div></div></div><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-4 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-4&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><a class="btn btn-bordered btn-md btn-default btn-block webrock-object" href="http://grozav.com/build/WebRock/index.php?demo=1" data-atts="{&quot;text&quot;:&quot;GET STARTED&quot;,&quot;href&quot;:&quot;http://grozav.com/build/WebRock/index.php?demo=1&quot;,&quot;type&quot;:&quot;btn-default&quot;,&quot;style&quot;:&quot;btn btn-bordered&quot;,&quot;size&quot;:&quot;btn-md&quot;,&quot;classes&quot;:&quot;btn-block&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="button" data-filter="*" data-filter-exclude="*">GET STARTED</a></div></div></div></div></div></div></header></div></div></div></div>';
        $html .= '<script type="text/javascript" id="owlcarousel-'.$id1.'_script">jQuery("#owlcarousel-'.$id1.'").owlCarousel({items:1,singleItem: true,autoplay: 5000, stopOnHover: false, pagination: true, navigation: true, transitionStyle: "scaleUp", navigationText:["&lt;","&gt;"],autoHeight: true});</script>';


        $html .= '<style>#header-' . $id1 . '3{background-image: url(img/default/header.jpg);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;img/default/header.jpg&#39;, sizingMethod=&#39;scale&#39;);-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;img/default/header.jpg&#39;, sizingMethod=&#39;scale&#39;)";background-color: #000000;}';
        $html .= '#header-' . $id1 . '6{background-image: url(img/default/header.jpg);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;img/default/header.jpg&#39;, sizingMethod=&#39;scale&#39;);-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;img/default/header.jpg&#39;, sizingMethod=&#39;scale&#39;)";background-color: #000000;}';
        $html .= '#header-' . $id1 . '{background-image: url(img/default/header.jpg);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;img /default/header - 8.jpg&#39;, sizingMethod=&#39;scale&#39;);-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;img /default/header - 8.jpg&#39;, sizingMethod=&#39;scale&#39;)";background-color: #000000;}</style>';

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
    $object = new WRHeaderSlider();
    $webrock->add_object($object);
}
