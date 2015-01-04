<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRTagCloud implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'tag-cloud';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Tag Cloud',
            'description' => 'A tag cloud object for search engine optimization.',
            'icon' => 'fa fa-tag',
            'keywords' => 'tag, cloud',
            'preview' => '<img src="' . objects_url() . '/tag-cloud/preview.jpg" alt="Tag Cloud" />',
            'filter' => '*',
            'order' => 25
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
            'keyvalue' => array(
                'title' => 'Key Value',
                'description' => 'Input multiple key value pairs for the object.',
                'type' => 'key-value',

                'default' => array(
                    'Grozav' => '#',
                    'Web' => '#',
                    'Development' => '#',
                    'Design' => '#',
                    'WebRock' => '#',
                    'Envato' => '#',
                ),
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

    function create($atts, $content = null)
    {
        $atts = webrock_atts_decode($atts);
        extract(webrock_atts($this->attributes(), $atts));

        $html = '<div class="tag-cloud">';
        $keyvalue = json_decode(html_entity_decode($keyvalue), true);
        foreach ($keyvalue as $key => $value)
            $html .= '<a href="' . $value . '" class="tag">' . $key . '</a>';
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
    $object = new WRTagCloud();
    $webrock->add_object($object);
}
