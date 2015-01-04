<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRNavbar implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'navbar';

    // Default Menu
    private $menu = array(
        array(
            'title' => 'HOME',
            'link' => 'index.html',
            'active' => 'true',
            'submenu' => array()
        ),
        array(
            'title' => 'ABOUT',
            'link' => 'about.html',
            'active' => 'false',
            'submenu' => array()
        ),
        array(
            'title' => 'PORTFOLIO',
            'link' => 'portfolio.html',
            'active' => 'false',
            'submenu' => array()
        ),
        array(
            'title' => 'BLOG',
            'link' => '#',
            'active' => 'false',
            'submenu' => array(
                array(
                    'title' => 'Blog Grid',
                    'link' => '#',
                    'active' => 'false',
                    'submenu' => array()
                ),
                array(
                    'title' => 'Blog Masonry',
                    'link' => '#',
                    'active' => 'false',
                    'submenu' => array()
                ),
                array(
                    'title' => 'Blog Single',
                    'link' => '#',
                    'active' => 'false',
                    'submenu' => array()
                )
            )
        ),
        array(
            'title' => 'CONTACT',
            'link' => 'contact.html',
            'active' => 'false',
            'submenu' => array()
        ),
    );

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Navbar',
            'description' => 'Create a new bootstrap navbar which can be set to different themes and display modes.',
            'icon' => 'fa fa-bars',
            'styles' => array(),
            'scripts' => array(),
            'preview' => '<img src="' . objects_url() . '/navbar/preview.png" alt="Navbar" />',
            'scripts-admin' => array(
                'navbar-admin-script' => objects_url() . 'navbar/navbar.admin.js'
            ),
            'keywords' => 'navbar, menu, nav, navigation, dropdown, bootstrap',
            'filter' => '*',
            'order' => 0
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
            'brandtext' => array(
                'title' => 'Brand Title',
                'description' => 'Choose a brand title for the navbar.',
                'type' => 'text',
                'default' => 'WebRock',
                'category' => 'Brand',
                'values' => null,
                'required' => false
            ),
            'brandimage' => array(
                'title' => 'Brand Logo',
                'description' => 'Choose a brand logo to show besides the title.',
                'type' => 'image',
                'default' => 'img/default/navlogo.png',
                'category' => 'Brand',
                'values' => null,
                'required' => false
            ),
            'brandlink' => array(
                'title' => 'Brand Link',
                'description' => 'Choose a link for the navbar brand.',
                'type' => 'text',
                'default' => 'index.html',
                'category' => 'Brand',
                'values' => null,
                'required' => true
            ),
            'menu' => array(
                'title' => 'Menu',
                'description' => 'Choose the Text, Link and Active status of each navbar menu.',
                'type' => 'navbarmenu',
                'default' => htmlspecialchars(json_encode($this->menu)),
                'category' => 'Menu',
                'values' => null,
                'required' => false
            ),
            'position' => array(
                'title' => 'Position',
                'description' => 'Choose a navbar position.',
                'type' => 'radio',
                'default' => 'navbar-default',
                'category' => 'Design',
                'values' => array(
                    'navbar-default' => 'Default',
                    'navbar-static-top' => 'Static Top',
                    'navbar-fixed-top' => 'Fixed Top',
                    'navbar-fixed-bottom' => 'Fixed Bottom'
                ),
                'required' => false
            ),
            'theme' => array(
                'title' => 'Theme',
                'description' => 'Choose the navbar theme.',
                'type' => 'radio',
                'default' => 'navbar-default',
                'category' => 'Design',
                'values' => array(
                    'navbar-default' => 'Default',
                    'navbar-inverse' => 'Inverse',
                ),
                'required' => false
            ),
            'contained' => array(
                'title' => 'Contained',
                'description' => 'Limit navbar background to container.',
                'type' => 'radio',
                'default' => '',
                'category' => 'Design',
                'values' => array(
                    'navbar-contained' => 'Enabled',
                    '' => 'Disabled'
                ),
                'required' => false
            ),
            'centered' => array(
                'title' => 'Centered',
                'description' => 'Center the navbar brand and navigation menu.',
                'type' => 'radio',
                'default' => '',
                'category' => 'Design',
                'values' => array(
                    'navbar-centered' => 'Enable',
                    '' => 'Disable'
                ),
                'required' => false
            ),
            'condense' => array(
                'title' => 'Condense',
                'description' => 'Make the navbar smaller after scrolling down.',
                'type' => 'radio',
                'default' => 'true',
                'category' => 'Design',
                'values' => array(
                    'true' => 'Enable',
                    'false' => 'Disable'
                ),
                'required' => false
            ),
            'overlay' => array(
                'title' => 'Overlay',
                'description' => 'Transparent background before scroll.',
                'type' => 'radio',
                'default' => '',
                'category' => 'Design',
                'values' => array(
                    'navbar-overlay' => 'Enabled',
                    '' => 'Disabled'
                ),
                'required' => false
            ),
            'overlaycolor' => array(
                'title' => 'Overlay Color',
                'description' => 'Change text color when navbar is overlayed.',
                'type' => 'radio',
                'default' => 'navbar-inverse-overlay',
                'category' => 'Design',
                'values' => array(
                    '' => 'Unchanged',
                    'navbar-default-overlay' => 'Default',
                    'navbar-inverse-overlay' => 'Inverse'
                ),
                'required' => false
            ),
            'menuposition' => array(
                'title' => 'Menu Position',
                'description' => 'Choose the position of the navbar menu.',
                'type' => 'radio',
                'default' => 'navbar-right',
                'category' => 'Design',
                'values' => array(
                    'navbar-left' => 'Left',
                    'navbar-right' => 'Right'
                ),
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the navbar object. Classes should be separated by a space. e.g. navbar-brand-hide-text',
                'type' => 'text',
                'default' => 'navbar-brand-hide-text',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'contactbar' => array(
                'title' => 'Contact Bar',
                'description' => 'Enable or disable contact bar.',
                'type' => 'radio',
                'default' => 'true',
                'category' => 'Contact Bar',
                'values' => array(
                    'true' => 'Enable',
                    'false' => 'Disable'
                ),
                'required' => false
            ),
            'social' => array(
                'title' => 'Contact Social Icons',
                'description' => 'Add social media links to the contact bar. First input is for the FontAwesome icon, second input is for the social profile link.',
                'type' => 'key-value',
                'default' => array(
                    'fa fa-leaf' => 'http://themeforest.net/user/Grozav',
                    'fa fa-facebook' => 'http://facebook.com/grozav.com',
                    'fa fa-twitter' => 'http://twitter.com/grozavcom',
                    'fa fa-google-plus' => 'plus.google.com/115589566670234501248',
                ),
                'category' => 'Contact Bar',
                'values' => '',
                'required' => false
            ),
            'phone' => array(
                'title' => 'Contact Phone',
                'description' => 'The phone number that appears in the Contact Bar.',
                'type' => 'text',
                'default' => '1.777.555.333',
                'category' => 'Contact Bar',
                'values' => null,
                'required' => false
            ),
            'email' => array(
                'title' => 'Contact Email',
                'description' => 'The email that appears in the Contact Bar.',
                'type' => 'text',
                'default' => 'you@yourcompany.com',
                'category' => 'Contact Bar',
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

        if ($brandimage == 'img/default/navlogo.png' && $theme == 'navbar-default') {
            $brandimage = 'img/default/navlogoinverse.png';
        }

        if ($overlay == '')
            $overlaycolor = '';

        $html = '';
        $html .= '<div class="navbar ' . $classes . ' ' . $theme . ' ' . $centered . ' ' . $overlay . ' ' . $overlaycolor . ' ' . $contained . ' ' . $position . '" role="navigation" ' . ($condense == 'true' ? 'data-condense="true"' : '') . '>';


        // Contact Bar
        if ($contactbar == 'true') {
            $html .= '<div class="contact-bar">' .
                '<div class="container">' .
                '<div class="row">' .
                '<div class="col-sm-8">' .
                '<ul class="contact-bar-list list-inline">';

            if ($phone != '')
                $html .= '<li>' .
                    '<a href="contact.html"><span class="contact-bar-item-label"><i class="fa fa-mobile-phone"></i> Call Us: </span>' . $phone . '</a>' .
                    '</li>';

            if($phone != '' && $email != '')
                $html .= '<li class="separator">|</li>';

            if ($email != '')
                $html .=                   '<li>' .
                    '<a href="mailto:' . $email . '"><span class="contact-bar-item-label"><i class="fa fa-envelope"></i> </span>' . $email . '</a>' .
                    '</li>';



            $html .= '</ul>' .
                '</div>' .
                '<div class="col-sm-4 hidden-xs" > ' .
                '<ul class="contact-bar-list list-inline text-right">';


            $social = json_decode(html_entity_decode($social), true);
            foreach ($social as $icon => $link) {
                $html .= '<li>' .
                    '<a href="' . $link . '">' .
                    '<i class="' . $icon . '"></i>' .
                    '</a>' .
                    '</li>';
            }

            $html .= '</ul>' .
                '</div>' .
                '</div>' .
                '</div>' .
                '</div>';
        }

        $html .= '<div class="container">';

        $html .= '<div class="navbar-header">';
        $html .= '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">'
            . '<span class="icon-bar"></span>'
            . '<span class="icon-bar"></span>'
            . '<span class="icon-bar"></span>'
            . '</button>';
        $html .= '<a class="navbar-brand" href="' . $brandlink . '">'
            . ($brandimage != '' ? '<div class="navbar-brand-image"><img src="' . html_entity_decode($brandimage) . '" alt="' . $brandtext . '" class="margin-right"/></div>' : '') . '<div class="navbar-brand-text">' . $brandtext . '</div>'
            . '</a>';
        $html .= '</div>';

        $html .= '<div class="navbar-collapse collapse">';
        $html .= '<ul class="nav navbar-nav ' . ($centered == '' ? $menuposition : '' ) . '">';

        $menu = json_decode(html_entity_decode(stripslashes($menu)), true);

        if (!empty($menu))
            foreach ($menu as $li) {
                $title = $li['title'];
                $link = $li['link'];
                $active = $li['active'];
                $submenu = $li['submenu'];

                if (empty($submenu)) {
                    $html .= '<li ' . ($active == 'true' ? 'class="active"' : '') . '><a href="' . $link . '">' . $title . '</a></li>';
                } else {
                    $html .= '<li ' . ($active == 'true' ? 'class="active"' : '') . '>'
                        . '<a href="' . $link . '" class="dropdown-toggle" data-toggle="dropdown">' . $title . ' <b class="caret"></b></a>';
                    $html .= '<ul class="dropdown-menu">';

                    foreach ($submenu as $innerli) {
                        $title = $innerli['title'];
                        $link = $innerli['link'];
                        $active = $innerli['active'];
                        $html .= '<li ' . ($active == 'true' ? 'class="active"' : '') . '><a href="' . $link . '">' . $title . '</a></li>';
                    }

                    $html .= '</ul>';
                    $html .= '</li>';
                }
            }

        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
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
    $object = new WRNavbar();
    $webrock->add_object($object);
}
