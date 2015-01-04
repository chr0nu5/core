<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRPricingBlock1 implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'pricing-block';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Pricing Block',
            'description' => 'Pricing tables are used for displaying different plans available for purchase from your company.',
            'icon' => 'fa fa-money',
            'preview' => '<img src="' . objects_url() . '/pricing-block/preview.jpg" alt="Pricing" />',
            'keywords' => 'pricing table, table, pricing, block',
            'filter' => '*',
            'order' => 6.1
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
        $html .= '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col col-md-12 webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column"><div class="webrock-content"><div class="text-center webrock-object" data-atts="{&quot;text&quot;:&quot;PRICING PLANS&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-center&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading   text-heading-bold">PRICING PLANS</h1></div><div class="textbox text-gray-dark  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></div></div></div></div></div><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="pricing-table  pricing-table-default webrock-object" data-atts="{&quot;title&quot;:&quot;LIGHT&quot;,&quot;price&quot;:&quot;$20&quot;,&quot;rate&quot;:&quot;per month&quot;,&quot;features&quot;:&quot;[&amp;quot;Amazing Design&amp;quot;,&amp;quot;Intuitive&amp;quot;,&amp;quot;Great User Experience&amp;quot;,&amp;quot;Easily Extendable&amp;quot;,&amp;quot;Drag and Drop&amp;quot;]&quot;,&quot;theme&quot;:&quot;pricing-table-default&quot;,&quot;ordertext&quot;:&quot;Order Now&quot;,&quot;orderlink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="pricingtable" data-filter="*" data-filter-exclude="*"><div class="panel text-center"><div class="panel-heading"><div class="pricing-table-title">LIGHT</div><div class="pricing-table-price"><h1>$20</h1><p>per month</p></div></div><ul class="list-group"><li class="list-group-item">Amazing Design</li><li class="list-group-item">Intuitive</li><li class="list-group-item">Great User Experience</li><li class="list-group-item">Easily Extendable</li><li class="list-group-item">Drag and Drop</li></ul><div class="pricing-table-footer"><a href="#" class="btn btn-block btn-primary">Order Now</a></div></div></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="pricing-table  pricing-table-default webrock-object" data-atts="{&quot;title&quot;:&quot;STANDARD&quot;,&quot;price&quot;:&quot;$33&quot;,&quot;rate&quot;:&quot;per month&quot;,&quot;features&quot;:&quot;[&amp;quot;Amazing Design&amp;quot;,&amp;quot;Intuitive&amp;quot;,&amp;quot;Great User Experience&amp;quot;,&amp;quot;Easily Extendable&amp;quot;,&amp;quot;Drag and Drop&amp;quot;]&quot;,&quot;theme&quot;:&quot;pricing-table-default&quot;,&quot;ordertext&quot;:&quot;Order Now&quot;,&quot;orderlink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="pricingtable" data-filter="*" data-filter-exclude="*"><div class="panel text-center"><div class="panel-heading"><div class="pricing-table-title">STANDARD</div><div class="pricing-table-price"><h1>$33</h1><p>per month</p></div></div><ul class="list-group"><li class="list-group-item">Amazing Design</li><li class="list-group-item">Intuitive</li><li class="list-group-item">Great User Experience</li><li class="list-group-item">Easily Extendable</li><li class="list-group-item">Drag and Drop</li></ul><div class="pricing-table-footer"><a href="#" class="btn btn-block btn-primary">Order Now</a></div></div></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="pricing-table  pricing-table-inverse webrock-object" data-atts="{&quot;title&quot;:&quot;PREMIUM&quot;,&quot;price&quot;:&quot;$59&quot;,&quot;rate&quot;:&quot;per month&quot;,&quot;features&quot;:&quot;[&amp;quot;Amazing Design&amp;quot;,&amp;quot;Intuitive&amp;quot;,&amp;quot;Great User Experience&amp;quot;,&amp;quot;Easily Extendable&amp;quot;,&amp;quot;Drag and Drop&amp;quot;]&quot;,&quot;theme&quot;:&quot;pricing-table-inverse&quot;,&quot;ordertext&quot;:&quot;Order Now&quot;,&quot;orderlink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="pricingtable" data-filter="*" data-filter-exclude="*"><div class="panel text-center"><div class="panel-heading"><div class="pricing-table-title">PREMIUM</div><div class="pricing-table-price"><h1>$59</h1><p>per month</p></div></div><ul class="list-group"><li class="list-group-item">Amazing Design</li><li class="list-group-item">Intuitive</li><li class="list-group-item">Great User Experience</li><li class="list-group-item">Easily Extendable</li><li class="list-group-item">Drag and Drop</li></ul><div class="pricing-table-footer"><a href="#" class="btn btn-block btn-primary">Order Now</a></div></div></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="pricing-table  pricing-table-default webrock-object" data-atts="{&quot;title&quot;:&quot;DELUXE&quot;,&quot;price&quot;:&quot;$105&quot;,&quot;rate&quot;:&quot;per month&quot;,&quot;features&quot;:&quot;[&amp;quot;Amazing Design&amp;quot;,&amp;quot;Intuitive&amp;quot;,&amp;quot;Great User Experience&amp;quot;,&amp;quot;Easily Extendable&amp;quot;,&amp;quot;Drag and Drop&amp;quot;]&quot;,&quot;theme&quot;:&quot;pricing-table-default&quot;,&quot;ordertext&quot;:&quot;Order Now&quot;,&quot;orderlink&quot;:&quot;#&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="pricingtable" data-filter="*" data-filter-exclude="*"><div class="panel text-center"><div class="panel-heading"><div class="pricing-table-title">DELUXE</div><div class="pricing-table-price"><h1>$105</h1><p>per month</p></div></div><ul class="list-group"><li class="list-group-item">Amazing Design</li><li class="list-group-item">Intuitive</li><li class="list-group-item">Great User Experience</li><li class="list-group-item">Easily Extendable</li><li class="list-group-item">Drag and Drop</li></ul><div class="pricing-table-footer"><a href="#" class="btn btn-block btn-primary">Order Now</a></div></div></div></div></div></div></div></div></div>';

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
    $object = new WRPricingBlock1();
    $webrock->add_object($object);
}
