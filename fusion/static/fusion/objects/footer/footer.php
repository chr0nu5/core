<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRFooter1 implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'footer';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Footer',
            'description' => 'Creaate .',
            'icon' => 'fa fa-inbox',
            'keywords' => 'footer',
            'preview' => '<img src="' . objects_url() . '/footer/preview.jpg" alt="Footer" />',
            'filter' => '*',
            'order' => 11.0
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
        return array( );
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

        $id = rand(0, 10000);
        
        $html = '<div class="solidbackground bg-gray-dark  webrock-object" id="imagebackground-'.$id.'" data-atts="{&quot;backgroundclass&quot;:&quot;bg-gray-dark&quot;,&quot;backgroundsolid&quot;:&quot;#000000&quot;,&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;id&quot;:&quot;imagebackground-'.$id.'&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="solidbackground" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="grid webrock-object" data-atts="{&quot;grid&quot;:&quot;4/4/4&quot;,&quot;container&quot;:&quot;1&quot;}" data-shortcode="grid" data-filter="*" data-filter-exclude="*"><div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="img  webrock-object" data-atts="{&quot;image&quot;:&quot;img/default/navlogo.png&quot;,&quot;alt&quot;:&quot;#&quot;,&quot;type&quot;:&quot;img-responsive&quot;,&quot;appearance&quot;:&quot;&quot;,&quot;link&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="image" data-filter="*" data-filter-exclude="*"><img src="img/default/navlogo.png" alt="#" class="img-responsive "></div><div class="textbox text-muted margin-top-1x webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;WebRock lorem ipsum dolor. Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;margin-top-1x&quot;,&quot;color&quot;:&quot;#897f79&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p>WebRock lorem ipsum dolor. Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></p></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="text-white webrock-object" data-atts="{&quot;text&quot;:&quot;BLOG POSTS&quot;,&quot;type&quot;:&quot;h3&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-white&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h3 class="heading   text-heading-bold">BLOG POSTS</h3></div><div class="textbox text-muted  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;ul&amp;gt;\n&amp;lt;li&amp;gt;&amp;lt;a href=&amp;quot;#&amp;quot;&amp;gt;WebRock is amazing&amp;lt;/a&amp;gt;&amp;lt;/li&amp;gt;\n&amp;lt;li&amp;gt;&amp;lt;a href=&amp;quot;#&amp;quot;&amp;gt;Extremely easy to use&amp;lt;/a&amp;gt;&amp;lt;/li&amp;gt;\n&amp;lt;li&amp;gt;&amp;lt;a href=&amp;quot;#&amp;quot;&amp;gt;Fullfeatured page builder&amp;lt;/a&amp;gt;&amp;lt;/li&amp;gt;\n&amp;lt;li&amp;gt;&amp;lt;a href=&amp;quot;#&amp;quot;&amp;gt;Responsive and beautiful&amp;lt;/a&amp;gt;&amp;lt;/li&amp;gt;\n&amp;lt;/ul&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#897f79&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><ul>
<li><a href="#">WebRock is amazing</a></li>
<li><a href="#">Extremely easy to use</a></li>
<li><a href="#">Fullfeatured page builder</a></li>
<li><a href="#">Responsive and beautiful</a></li>
</ul></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="text-white webrock-object" data-atts="{&quot;text&quot;:&quot;OUR TWITTER&quot;,&quot;type&quot;:&quot;h3&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-white&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h3 class="heading   text-heading-bold">OUR TWITTER</h3></div><div class="textbox text-muted  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p&amp;gt;&amp;lt;a href=&amp;quot;#&amp;quot;&amp;gt;@grozavcom&amp;lt;/a&amp;gt;&amp;amp;nbsp;WebRock is simply amazing. All those features are overwhelming!&amp;lt;/p&amp;gt;\n&amp;lt;p class=&amp;quot;text-right text-xs text-gray&amp;quot;&amp;gt;2 minutes ago&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#897f79&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p><a href="#">@grozavcom</a>&nbsp;WebRock is simply amazing. All those features are overwhelming!</p>
<p class="text-right text-xs text-gray">2 minutes ago</p></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="text-white webrock-object" data-atts="{&quot;text&quot;:&quot;TAGS&quot;,&quot;type&quot;:&quot;h3&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-white&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*" style="position: relative;"><h3 class="heading   text-heading-bold">TAGS</h3></div><div class="tag-cloud webrock-object" data-atts="{&quot;keyvalue&quot;:&quot;{&amp;quot;Grozav&amp;quot;:&amp;quot;#&amp;quot;,&amp;quot;Web&amp;quot;:&amp;quot;#&amp;quot;,&amp;quot;Development&amp;quot;:&amp;quot;#&amp;quot;,&amp;quot;Design&amp;quot;:&amp;quot;#&amp;quot;,&amp;quot;WebRock&amp;quot;:&amp;quot;#&amp;quot;,&amp;quot;Envato&amp;quot;:&amp;quot;#&amp;quot;}&quot;}" data-shortcode="tag-cloud" data-filter="*" data-filter-exclude="*"><a href="#" class="tag">Grozav</a><a href="#" class="tag">Web</a><a href="#" class="tag">Development</a><a href="#" class="tag">Design</a><a href="#" class="tag">WebRock</a><a href="#" class="tag">Envato</a></div></div></div></div></div></div></div></div></div></div><div class="solidbackground bg-gray-darker  webrock-object" id="imagebackground-'.$id.'" data-atts="{&quot;backgroundclass&quot;:&quot;bg-gray-darker&quot;,&quot;backgroundsolid&quot;:&quot;#000000&quot;,&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;id&quot;:&quot;imagebackground-'.$id.'&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="solidbackground" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-1x margin-bottom-1x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-1x margin-bottom-1x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="col   col-md-12   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="textbox   webrock-object" style="color:#ecf0f1" data-atts="{&quot;text&quot;:&quot;&amp;lt;p class=&amp;quot;text-center margin-none&amp;quot;&amp;gt;Copyright &amp;amp;copy; 2014 Grozav. All rights reserved.&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ecf0f1&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p class="text-center margin-none">Copyright © 2014 Grozav. All rights reserved.</p></div></div></div></div></div></div></div></div></div>';

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
    $object = new WRFooter1();
    $webrock->add_object($object);
}
