<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRTeamMember implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'teammember';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Team Member',
            'description' => 'Team Member blocks are used to display the professions and qualities of your team members.',
            'icon' => 'fa fa-user',
            'styles' => array(
                'teammember-style' => objects_url() . 'teammember/teammember.css'
            ),
            'preview' => '<img src="' . objects_url() . '/teammember/preview.jpg" alt="Team Member" />',
            'keywords' => 'team member, about, block',
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
                'description' => 'Choose the style of the team member element.',
                'type' => 'radio',
                'default' => 'team-member-1',
                'category' => null,
                'values' => array(
                    'team-member-1' => "Style 1",
                    'team-member-2' => "Style 2",
                    'team-member-3' => "Style 3"
                ),
                'required' => false
            ),
            'image' => array(
                'title' => 'Member Photo',
                'description' => 'Choose a photo for your team member.',
                'type' => 'image',
                'default' => 'img/default/teammember.jpg',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'name' => array(
                'title' => 'Name',
                'description' => 'Input the name of the team member.',
                'type' => 'text',
                'default' => 'John Doe',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'profession' => array(
                'title' => 'Profession',
                'description' => 'Input the profession of the team member.',
                'type' => 'text',
                'default' => 'Web Developer',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'description' => array(
                'title' => 'Description',
                'description' => 'Enter a description for the team member.',
                'type' => 'wysiwyg',
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'theme' => array(
                'title' => 'Theme',
                'description' => 'Choose the theme of the team member block.',
                'type' => 'radio',
                'default' => 'team-member-default',
                'category' => null,
                'values' => array(
                    'team-member-transparent' => "Transparent",
                    'team-member-default' => "Default",
                    'team-member-inverse' => "Inverse"
                ),
                'required' => false
            ),
            'social' => array(
                'title' => 'Social Links',
                'description' => 'Choose a key-value relation for the social icons. The first column is the <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome Icon</a>, while the second column is the link to your profile.',
                'type' => 'key-value',
                'default' => array(
                    'fa fa-twitter' => 'http://twitter.com/grozavcom',
                    'fa fa-facebook' => 'http://facebook.com/grozavcom',
                    'fa fa-google-plus' => 'http;//plus.google.com/#',
                    'fa fa-linkedin' => 'http://linkedin.com/pub/alex-grozav/48/4b3/127'
                ),
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the team member is in view.',
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
        $html .= '<div class="team-member ' . $style . ' ' . $classes . ' ' . $theme . ' text-center" ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . '>';
        $html .= '<div class="team-member-img-wrapper">';
        $html .= '<img src="' . $image . '" class="img-fullwidth team-member-image"/>';
        $html .= '</div>';
        $html .= '<div class="team-member-details">';
        $html .= '<h2 class="team-member-name">' . $name . '</h2>';
        $html .= '<h4 class="team-member-profession">' . $profession . '</h4>';
        $description = html_entity_decode($description);
        $html .= '<div class="team-member-description text-sm">' . $description . '</div>';
        $html .= '<ul class="team-member-social list-inline">';
        $social = json_decode(html_entity_decode($social), true);
        foreach ($social as $key => $value)
            $html .= '<li><a href="' . $value . '"><i class="' . $key . '"></i></a></li>';
        $html .= '</ul>';
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
    $object = new WRTeamMember();
    $webrock->add_object($object);
}
