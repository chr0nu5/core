<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRPricingTable implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'pricingtable';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Pricing Table',
            'description' => 'Pricing tables are used for displaying different plans available for purchase from your company.',
            'icon' => 'fa fa-money',
            'styles' => array(
                'pricing-table-style' => objects_url() . 'pricingtable/pricingtable.css'
            ),
            'preview' => '<img src="' . objects_url() . '/pricingtable/preview.jpg" alt="Pricing" />',
            'keywords' => 'pricing table, table, pricing',
            'filter' => '*',
            'order' => 19
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
                'description' => 'Choose the pricing table title.',
                'type' => 'text',
                'default' => 'Standard',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'price' => array(
                'title' => 'Price',
                'description' => 'Choose the pricing table display price.',
                'type' => 'text',
                'default' => '$33',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'rate' => array(
                'title' => 'Payment Rate',
                'description' => 'Input the frequency of the payment (per year, per month, per day, etc.)',
                'type' => 'text',
                'default' => 'per month',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'features' => array(
                'title' => 'Features',
                'description' => 'Input the features you offer with this pricing plan.',
                'type' => 'text-repeater',
                'default' => array(
                    'Amazing Design',
                    'Intuitive',
                    'Great User Experience',
                    'Easily Extendable',
                    'Drag and Drop'
                ),
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'theme' => array(
                'title' => 'Theme',
                'description' => 'Choose the theme of the pricing table element.',
                'type' => 'radio',
                'default' => 'pricing-table-default',
                'category' => null,
                'values' => array(
                    'pricing-table-default' => "Default",
                    'pricing-table-inverse' => "Inverse"
                ),
                'required' => false
            ),
            'ordertext' => array(
                'title' => 'Order Text',
                'description' => 'Choose the text of your Order button.',
                'type' => 'text',
                'default' => 'Order Now',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'orderlink' => array(
                'title' => 'Order Text',
                'description' => 'Choose the text of your Order button.',
                'type' => 'text',
                'default' => '#',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the pricing table is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the pricing table object. Classes should be separated by a space.',
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
            'price' => '',
            'rate' => '',
            'theme' => '',
            'features' => '',
            'ordertext' => 'Purchase Now',
            'orderlink' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="pricing-table ' . $classes . ' ' . $theme . '" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        $html .= '<div class="panel text-center">';

        $html .= '<div class="panel-heading">';
        $html .= '<div class="pricing-table-title">' . $title . '</div>';
        $html .= '<div class="pricing-table-price">';
        $html .= '<h1>' . $price . '</h1>';
        $html .= '<p>' . $rate . '</p>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<ul class="list-group">';
        $features = json_decode(html_entity_decode($features), true);
        foreach ($features as $feature) {
            $html .= '<li class="list-group-item">' . $feature . '</li>';
        }
        $html .= '</ul>';


        $html .= '<div class="pricing-table-footer">';
        $html .= '<a href="' . $orderlink . '" class="btn btn-block btn-primary">' . $ordertext . '</a>';
        $html .= '</div>';

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
    $object = new WRPricingTable();
    $webrock->add_object($object);
}
