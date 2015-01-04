<?php

/* =============================================
 * Portfolio 
 * 
 * @type WebRock Object
 * ============================================= */

class WRPortfolio implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'portfolio';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Portfolio',
            'description' => 'Create a new responsive portfolio with filtering.',
            'icon' => 'fa fa-photo',
            'preview' => '<img src="' . objects_url() . '/portfolio/preview.jpg" alt="Portfolio" />',
            'styles' => array(
                'fluidbox-style' => objects_url() . 'portfolio/portfolio.swipebox.css',
                'portfolio-style' => objects_url() . 'portfolio/portfolio.css'
            ),
            'scripts' => array(
                'fluidbox-script' => objects_url() . 'portfolio/portfolio.swipebox.plugin.js',
                'imagesloaded-script' => objects_url() . 'portfolio/portfolio.imagesloaded.plugin.js',
                'isotope-script' => objects_url() . 'portfolio/portfolio.isotope.plugin.js'
            ),
            'scripts-admin' => array(
                'portfolio-admin-script' => objects_url() . 'portfolio/portfolio.admin.js'
            ),
            'keywords' => 'portfolio, images, project',
            'filter' => array(
                'values' => 'portfolio-project',
                'exclude' => false
            ),
            'order' => 3
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
            'filter' => array(
                'title' => 'Categories',
                'description' => 'Choose the cateogries of the portfolio object. First row represents the category id, second row represents the display title.',
                'type' => 'key-value',
                'default' => array(
                    'category1' => 'Category 1',
                    'category2' => 'Category 2',
                    'category3' => 'Category 3'
                ),
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'filtertheme' => array(
                'title' => 'Filter Theme',
                'description' => 'Choose the theme of the portfolio filter section.',
                'type' => 'radio',
                'default' => 'portfolio-filter-inverse',
                'category' => null,
                'values' => array(
                    'portfolio-filter-default' => "Default",
                    'portfolio-filter-inverse' => "Inverse"
                ),
                'required' => false
            ),
            'portfolio_lg' => array(
                'title' => 'Responsive Desktop',
                'description' => 'Select the number of projects per row to display on a Desktop (lg)',
                'type' => 'radio',
                'default' => 'portfolio-col-lg-4',
                'category' => null,
                'values' => array(
                    'portfolio-col-lg-1' => "1",
                    'portfolio-col-lg-2' => "2",
                    'portfolio-col-lg-3' => "3",
                    'portfolio-col-lg-4' => "4"
                ),
                'required' => false
            ),
            'portfolio_md' => array(
                'title' => 'Responsive Laptop',
                'description' => 'Select the number of projects per row to display on a Laptop (md)',
                'type' => 'radio',
                'default' => 'portfolio-col-md-3',
                'category' => null,
                'values' => array(
                    'portfolio-col-md-1' => "1",
                    'portfolio-col-md-2' => "2",
                    'portfolio-col-md-3' => "3",
                    'portfolio-col-md-4' => "4"
                ),
                'required' => false
            ),
            'portfolio_sm' => array(
                'title' => 'Responsive Tablet',
                'description' => 'Select the number of projects per row to display on a Tablet (sm)',
                'type' => 'radio',
                'default' => 'portfolio-col-sm-2',
                'category' => null,
                'values' => array(
                    'portfolio-col-sm-1' => "1",
                    'portfolio-col-sm-2' => "2",
                    'portfolio-col-sm-3' => "3",
                    'portfolio-col-sm-4' => "4"
                ),
                'required' => false
            ),
            'portfolio_xs' => array(
                'title' => 'Responsive Phone',
                'description' => 'Select the number of projects per row to display on a Phone (xs)',
                'type' => 'radio',
                'default' => 'portfolio-col-xs-1',
                'category' => null,
                'values' => array(
                    'portfolio-col-xs-1' => "1",
                    'portfolio-col-xs-2' => "2",
                    'portfolio-col-xs-3' => "3",
                    'portfolio-col-xs-4' => "4"
                ),
                'required' => false
            ),
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Input an unique ID for the portfolio.',
                'type' => 'id',
                'default' => 'portfolio',
                'category' => null,
                'values' => null,
                'required' => true
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the portfolio object. Classes should be separated by a space.',
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
            'id' => '',
            'filter' => '',
            'filtertheme' => '',
            'ajaxload' => array(),
            'portfolio_xs' => '',
            'portfolio_sm' => '',
            'portfolio_md' => '',
            'portfolio_lg' => '',
            'classes' => ''
                        ), $atts));

        $html = '';

        $html .= '<div class="portfolio-wrapper ' . $classes . '">';

        $filter = json_decode(html_entity_decode($filter), true);

        if (!empty($filter)) {
            $html .= '<div class="portfolio-filter-wrapper ' . $filtertheme . '">';
            $html .= '<div class="container">';
            $html .= '<div class="row">';
            $html .= '<div class="col-md-12">';

            $html .= '<div class="portfolio-filter" data-filter-target="#' . $id . '" >';
            $html .= '<ul class="list-inline">';
            $html .= '<li>';
            $html .= '<a class="active" href="javascript:void(0);" data-filter-value="*">';
            $html .= 'All';
            $html .= '</a>';
            $html .= '</li>';


            foreach ($filter as $categid => $title) {
                $html .= '<li>';
                $html .= '<a href="javascript:void(0);" data-filter-value=".' . $categid . '">';
                $html .= $title;
                $html .= '</a>';
                $html .= '</li>';
            }

            $html .= '</ul>';
            $html .= '</div>';

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }


        $portfolio = '';
        $portfolio .= '<div class="portfolio-project category1 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-1.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-1.jpg&quot;,&quot;categoryid&quot;:&quot;category1&quot;,&quot;category&quot;:&quot;Category 1&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 1</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-1.jpg" rel="category1" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-1.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category1 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-2.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-2.jpg&quot;,&quot;categoryid&quot;:&quot;category1&quot;,&quot;category&quot;:&quot;Category 1&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 1</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-2.jpg" rel="category1" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-2.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category3 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-3.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-3.jpg&quot;,&quot;categoryid&quot;:&quot;category3&quot;,&quot;category&quot;:&quot;Category 3&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 3</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-3.jpg" rel="category3" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-3.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category3 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-4.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-4.jpg&quot;,&quot;categoryid&quot;:&quot;category3&quot;,&quot;category&quot;:&quot;Category 3&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 3</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-4.jpg" rel="category3" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-4.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category1 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-5.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-5.jpg&quot;,&quot;categoryid&quot;:&quot;category1&quot;,&quot;category&quot;:&quot;Category 1&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 1</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-5.jpg" rel="category1" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-5.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category1 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-6.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-6.jpg&quot;,&quot;categoryid&quot;:&quot;category1&quot;,&quot;category&quot;:&quot;Category 1&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 1</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-6.jpg" rel="category1" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-6.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category2 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-7.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-7.jpg&quot;,&quot;categoryid&quot;:&quot;category2&quot;,&quot;category&quot;:&quot;Category 2&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 2</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-7.jpg" rel="category2" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-7.jpg" alt="WebRock"></div></div>';
        $portfolio .= '<div class="portfolio-project category2 webrock-object" data-atts="{&quot;title&quot;:&quot;WebRock&quot;,&quot;href&quot;:&quot;project.html&quot;,&quot;fullimage&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-8.jpg&quot;,&quot;thumbnail&quot;:&quot;img&amp;#x2F;default&amp;#x2F;image-8.jpg&quot;,&quot;categoryid&quot;:&quot;category2&quot;,&quot;category&quot;:&quot;Category 2&quot;}" data-shortcode="portfolio-project" data-filter="*" data-filter-exclude=""><div class="portfolio-project-details"><div class="portfolio-vertical-center"><div class="portfolio-project-title">WebRock</div><div class="portfolio-project-category">Category 2</div></div><div class="portfolio-project-actions"><a href="project.html" class="portfolio-project-link"><i class="fa fa-link"></i></a><a href="img/default/image-8.jpg" rel="category2" class="portfolio-project-lightbox"><i class="fa fa-search-plus"></i></a></div></div><div class="portfolio-project-image"><img src="img/default/image-8.jpg" alt="WebRock"></div></div>';

        $content = $content == null ? $portfolio : $content;

        $html .= '<div class="portfolio ' . $portfolio_xs . ' ' . $portfolio_sm . ' ' . $portfolio_md . ' ' . $portfolio_lg . '" id="' . $id . '">';
        $html .= webrock_do_shortcode($content);
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
    $object = new WRPortfolio();
    $webrock->add_object($object);
}
