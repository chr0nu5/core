<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRService implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'service';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Service',
            'description' => 'Create a new service panel.',
            'icon' => 'fa fa-briefcase',
            'styles' => array(
                'service-style' => objects_url() . 'service/service.css'
            ),
            'scripts' => array(),
            'scripts-admin' => array(
                'service-admin-script' => objects_url() . 'service/service.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/service/preview.jpg" alt="Service" />',
            'keywords' => 'service, panel, icon',
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

    function attributes()
    {
        return array(
            'style' => array(
                'title' => 'Style',
                'description' => 'Choose the style of the service element.',
                'type' => 'radio',
                'default' => 'service-1',
                'category' => null,
                'values' => array(
                    'service-1' => "Center",
                    'service-2' => "Left",
                    'service-3' => "Right",
                    'service-4' => "Side Icon Left",
                    'service-5' => "Side Icon Right",
                    'service-6' => "Inline Icon"
                ),
                'required' => false
            ),
            'border' => array(
                'title' => 'Border',
                'description' => 'Choose the hover border of the service element.',
                'type' => 'select',
                'default' => 'service-border-3',
                'category' => null,
                'values' => array(
                    '' => "No border",
                    'service-border-1' => "All Sides",
                    'service-border-2' => "Top and Bottom",
                    'service-border-5' => "Left and Right",
                    'service-border-3' => "Top",
                    'service-border-4' => "Bottom",
                    'service-border-6' => "Left",
                    'service-border-7' => "Right"
                ),
                'required' => false
            ),
            'icon' => array(
                'title' => 'Icon',
                'description' => 'Choose an icon for the service panel.',
                'type' => 'icon',
                'default' => 'fa fa-cube',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'iconsize' => array(
                'title' => 'Icon Size',
                'description' => 'Choose the icon size of the service element.',
                'type' => 'select',
                'default' => '4x',
                'category' => null,
                'values' => array(
                    '1x' => "Extrasmall",
                    '2x' => "Small",
                    '3x' => "Medium",
                    '4x' => "Large",
                    '5x' => "Extralarge"
                ),
                'required' => false
            ),
            'title' => array(
                'title' => 'Title',
                'description' => 'Choose the service title.',
                'type' => 'text',
                'default' => 'WebRock',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'titlesize' => array(
                'title' => 'Title Size',
                'description' => 'Choose the title size of the service element.',
                'type' => 'select',
                'default' => 'h4',
                'category' => null,
                'values' => array(
                    'h1' => "Heading 1",
                    'h2' => "Heading 2",
                    'h3' => "Heading 3",
                    'h4' => "Heading 4",
                    'h5' => "Heading 5",
                    'h6' => "Heading 6"
                ),
                'required' => false
            ),
            'font' => array(
                'title' => 'Title Font',
                'description' => 'Choose one of WebRock\'s fonts for the title.',
                'type' => 'radio',
                'default' => 'text-heading-bold',
                'category' => '',
                'values' => array(
                    '' => 'Default',
                    'text-heading-bold' => 'Retro',
                    'text-pacifico' => 'Vintage'
                ),
                'required' => false
            ),

            'description' => array(
                'title' => 'Description',
                'description' => 'Choose the service description.',
                'type' => 'wysiwyg',
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'theme' => array(
                'title' => 'Type',
                'description' => 'Choose the theme of the service element.',
                'type' => 'radio',
                'default' => 'service-default',
                'category' => null,
                'values' => array(
                    'service-transparent' => "Transparent",
                    'service-default' => "Default",
                    'service-inverse' => "Inverse"
                ),
                'required' => false
            ),
            'readmore' => array(
                'title' => 'Read More Text',
                'description' => 'Input the read more text.',
                'type' => 'text',
                'default' => 'Read More',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'readmorelink' => array(
                'title' => 'Read More Link',
                'description' => 'Input the read more link.',
                'type' => 'text',
                'default' => '#',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the service is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the textarea object. Classes should be separated by a space.',
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

    function create($atts, $content = null)
    {
        $atts = webrock_atts_decode($atts);
        extract(webrock_atts($this->attributes(), $atts));
        $html = '';


        $html .= '<div class="' . $style . ' ' . $border . ' ' . $classes . ' ' . $theme . ' service" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        if ($icon != '')
            $html .= '<i class="fa-' . $iconsize . ' service-icon ' . $icon . '"></i> ';
        $html .= '<'.$titlesize.' class="service-title '.$font.'">' . $title . '</'.$titlesize.'>';
        $html .= '<div class="service-description">' . html_entity_decode($description) . '</div>';
        if ($readmore != '')
            $html .= '<a class="service-link" href="' . $readmorelink . '">' . $readmore . ' <i class="fa fa-caret-right"></i></a>';
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
    $object = new WRService();
    $webrock->add_object($object);
}
