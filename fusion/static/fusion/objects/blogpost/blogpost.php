<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRBlogPost implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'blogpost';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Blog Post',
            'description' => 'Create a new blogpost.',
            'icon' => 'fa fa-file-text',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'blogpost-admin-script' => objects_url() . 'blogpost/blogpost.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/blogpost/preview.jpg" alt="Blog Post" />',
            'keywords' => 'blogpost, href, anchor, bootstrap',
            'filter' => '*',
            'order' => 33
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
            'image' => array(
                'title' => 'Image',
                'description' => 'Choose the preview image of the blog post.',
                'type' => 'image',
                'default' => 'img/default/image-7.jpg',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'title' => array(
                'title' => 'Image',
                'description' => 'Choose the title of the blog post.',
                'type' => 'text',
                'default' => 'Blog Title',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'date' => array(
                'title' => 'Date',
                'description' => 'Choose the date of the blog post.',
                'type' => 'text',
                'default' => '25/05/2014',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'excerpt' => array(
                'title' => 'Excerpt',
                'description' => 'Choose the excerpt of the blog post.',
                'type' => 'wysiwyg',
                'default' => 'Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong>',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'linktext' => array(
                'title' => 'Link Text',
                'description' => 'Choose the text of the read more button.',
                'type' => 'text',
                'default' => 'Read More',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'link' => array(
                'title' => 'Link',
                'description' => 'Choose the anchor link of the blog post.',
                'type' => 'text',
                'default' => 'http://google.com',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'linkicon' => array(
                'title' => 'Link Icon',
                'description' => 'Choose the icon of the read more button.',
                'type' => 'icon',
                'default' => 'fa fa-chevron-right',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the blogpost object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose an animation for the blog post object.',
                'type' => 'animation',
                'default' => null,
                'category' => 'Design',
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
            'image' => '',
            'title' => '',
            'date' => '',
            'excerpt' => '',
            'linktext' => '',
            'linkicon' => '',
            'linkhref' => '',
            'ajaxload' => array(),
            'animation' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="blog-post '.$classes.'" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        if ($image != '')
            $html .= '<img class="img-fullwidth" src="' . $image . '" alt="' . $title . '"/>';

        $html .= '<div class="blog-post-body">';
        $html .= '<h3 class="blog-post-title">' . $title . '</h3>';
        $html .= '<span class="blog-post-date text-xs">' . $date . '</span><br/>';
        $html .= '<div class="blog-post-excerpt text-sm">';
        $html .= html_entity_decode($excerpt);
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="blog-post-footer">';
        $html .= '<a ' . ($classes != '' ? 'class="' . $classes . '"' : '') . ' href="' . $linkhref . '" >';
        if ($linkicon != '')
            $html .= '<i class="' . $linkicon . ' pull-right"></i> ';
        $html .= $linktext;
        $html .= '</a>';
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
    $object = new WRBlogPost();
    $webrock->add_object($object);
}
