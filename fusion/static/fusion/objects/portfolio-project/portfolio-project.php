<?php

/* =============================================
 * Portfolio Project 
 * 
 * @type WebRock Object
 * ============================================= */

class WRPortfolioProject implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'portfolio-project';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Portfolio Project',
            'description' => 'Create a new portfolio project. Projects are the items in your gallery or portfolio.',
            'icon' => 'fa fa-photo',
            'scripts-admin' => array(
                'portfolio-project-admin-script' => objects_url() . 'portfolio-project/portfolio-project.admin.js'
            ),
            'keywords' => 'portfolio project, images, project',
            'filter' => array(
                'values' => '*',
                'exclude' => false
            ),
            'order' => 23
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
                'description' => 'Choose a title for your project.',
                'type' => 'text',
                'default' => 'WebRock',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'href' => array(
                'title' => 'Link',
                'description' => 'Choose what your project will link to.',
                'type' => 'text',
                'default' => 'project.html',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'fullimage' => array(
                'title' => 'Fullsize Image',
                'description' => 'Choose a fullsize image to be used.',
                'type' => 'image',
                'default' => 'img/default/image-1.jpg',
                'category' => 'Image',
                'values' => null,
                'required' => false
            ),
            'thumbnail' => array(
                'title' => 'Thumbnail',
                'description' => 'If images are uploaded locally, thumbnails are automatically generated inside a <strong>img/thumbnails</strong> folder.',
                'type' => 'image',
                'default' => 'img/default/image-1.jpg',
                'category' => 'Image',
                'values' => null,
                'required' => false
            ),
            'categoryid' => array(
                'title' => 'Category ID',
                'description' => 'Choose the project category id. Category IDs are used for filtering.',
                'type' => 'text',
                'default' => 'category1',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'category' => array(
                'title' => 'Category Title',
                'description' => 'Choose the project category title.',
                'type' => 'text',
                'default' => 'Category 1',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the portfolio project object. Classes should be separated by a space.',
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
            'title' => '',
            'category' => '',
            'categoryid' => '',
            'href' => '',
            'thumbnail' => '',
            'fullimage' => '',
            'classes' => ''
                        ), $atts));

        $html = '<div class="portfolio-project ' . $classes . ' ' . $categoryid . '">';
        $html .= '<div class="portfolio-project-details">';

        $html .= '<div class="portfolio-vertical-center">';
        $html .= '<div class="portfolio-project-title">';
        $html .= $title;
        $html .= '</div>';
        $html .= '<div class="portfolio-project-category">';
        $html .= $category;
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="portfolio-project-actions">';
        if ($href != '')
            $html .= '<a href="' . $href . '" class="portfolio-project-link"><i class="fa fa-link"></i></a>';
        if ($fullimage != '')
            $html .= '<a href="' . $fullimage . '"  rel="' . $categoryid . '" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a>';
        $html .= '</div>';

        $html .= '</div>';

        $html .= '<div class="portfolio-project-image">';
        $html .= '<img src="' . $thumbnail . '" alt="' . $title . '" />';
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
    $object = new WRPortfolioProject();
    $webrock->add_object($object);
}
