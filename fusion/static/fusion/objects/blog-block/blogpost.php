<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRBlogBlock implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'blog-block';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Blog Block',
            'description' => 'Create a new blogpost.',
            'icon' => 'fa fa-copy',
            'preview' => '<img src="' . objects_url() . '/blog-block/preview.jpg" alt="Blog Block" />',
            'keywords' => 'blogpost, post, blog, href, anchor, bootstrap',
            'filter' => '*',
            'order' => 11.5
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

    function create($atts, $content = null) {
        $atts = webrock_atts_decode($atts);
        extract(shortcode_atts(array(), $atts));

        $html = '';
        $html .= '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-4 col-md-4   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-4&quot;,&quot;md&quot;:&quot;col-md-4&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="blog-post  webrock-object" data-atts="{&quot;image&quot;:&quot;img/default/image-7.jpg&quot;,&quot;title&quot;:&quot;Blog Title&quot;,&quot;date&quot;:&quot;25/05/2014&quot;,&quot;excerpt&quot;:&quot;&amp;lt;p&amp;gt;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;linktext&quot;:&quot;Read More&quot;,&quot;link&quot;:&quot;http://google.com&quot;,&quot;linkicon&quot;:&quot;fa fa-chevron-right&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="blogpost" data-filter="*" data-filter-exclude="*"><img class="img-fullwidth" src="img/default/image-7.jpg" alt="Blog Title"><div class="blog-post-body"><h3 class="blog-post-title">Blog Title</h3><span class="blog-post-date text-xs">25/05/2014</span><br><div class="blog-post-excerpt text-sm"><p>Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></p></div></div><div class="blog-post-footer"><a href=""><i class="fa fa-chevron-right pull-right"></i> Read More</a></div></div></div></div><div class="col  col-sm-4 col-md-4   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-4&quot;,&quot;md&quot;:&quot;col-md-4&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="blog-post  webrock-object" data-atts="{&quot;image&quot;:&quot;img/default/image-5.jpg&quot;,&quot;title&quot;:&quot;Blog Title&quot;,&quot;date&quot;:&quot;25/05/2014&quot;,&quot;excerpt&quot;:&quot;&amp;lt;p&amp;gt;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;linktext&quot;:&quot;Read More&quot;,&quot;link&quot;:&quot;http://google.com&quot;,&quot;linkicon&quot;:&quot;fa fa-chevron-right&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="blogpost" data-filter="*" data-filter-exclude="*"><img class="img-fullwidth" src="img/default/image-5.jpg" alt="Blog Title"><div class="blog-post-body"><h3 class="blog-post-title">Blog Title</h3><span class="blog-post-date text-xs">25/05/2014</span><br><div class="blog-post-excerpt text-sm"><p>Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></p></div></div><div class="blog-post-footer"><a href=""><i class="fa fa-chevron-right pull-right"></i> Read More</a></div></div></div></div><div class="col  col-sm-4 col-md-4   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-4&quot;,&quot;md&quot;:&quot;col-md-4&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="blog-post  webrock-object" data-atts="{&quot;image&quot;:&quot;img/default/image-1.jpg&quot;,&quot;title&quot;:&quot;Blog Title&quot;,&quot;date&quot;:&quot;25/05/2014&quot;,&quot;excerpt&quot;:&quot;&amp;lt;p&amp;gt;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&quot;,&quot;linktext&quot;:&quot;Read More&quot;,&quot;link&quot;:&quot;http://google.com&quot;,&quot;linkicon&quot;:&quot;fa fa-chevron-right&quot;,&quot;classes&quot;:&quot;&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="blogpost" data-filter="*" data-filter-exclude="*"><img class="img-fullwidth" src="img/default/image-1.jpg" alt="Blog Title"><div class="blog-post-body"><h3 class="blog-post-title">Blog Title</h3><span class="blog-post-date text-xs">25/05/2014</span><br><div class="blog-post-excerpt text-sm"><p>Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></p></div></div><div class="blog-post-footer"><a href=""><i class="fa fa-chevron-right pull-right"></i> Read More</a></div></div></div></div></div></div></div></div>';

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
    $object = new WRBlogBlock();
    $webrock->add_object($object);
}
