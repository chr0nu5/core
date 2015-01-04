<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRTeamBlock1 implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'team-block';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Team Block',
            'description' => 'Team Member blocks are used to display the professions and qualities of your team members.',
            'icon' => 'fa fa-users',
            'preview' => '<img src="' . objects_url() . '/team-block/preview.jpg" alt="Team" />',
            'keywords' => 'team member, about, block',
            'filter' => '*',
            'order' => 5.1
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

    function create($atts, $content = null)
    {
        $atts = webrock_atts_decode($atts);
        extract(webrock_atts($this->attributes(), $atts));

        $html = '';
        $html .= '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col col-md-12 webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column"><div class="webrock-content"><div class="text-center webrock-object" data-atts="{&quot;text&quot;:&quot;OUR TEAM&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-center&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*"><h1 class="heading   text-heading-bold">OUR TEAM</h1></div><div class="textbox text-gray-dark  webrock-object" data-atts="{&quot;text&quot;:&quot;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&amp;lt;/p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></div></div></div></div></div><div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content"><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="team-member team-member-1  team-member-inverse text-center webrock-object" data-atts="{&quot;style&quot;:&quot;team-member-1&quot;,&quot;image&quot;:&quot;img/default/teammember.jpg&quot;,&quot;name&quot;:&quot;John Doe&quot;,&quot;profession&quot;:&quot;Manager&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;team-member-inverse&quot;,&quot;social&quot;:&quot;{&amp;quot;fa fa-twitter&amp;quot;:&amp;quot;http://twitter.com/grozavcom&amp;quot;,&amp;quot;fa fa-facebook&amp;quot;:&amp;quot;http://facebook.com/grozavcom&amp;quot;,&amp;quot;fa fa-google-plus&amp;quot;:&amp;quot;http;//plus.google.com/#&amp;quot;,&amp;quot;fa fa-linkedin&amp;quot;:&amp;quot;http://linkedin.com/pub/alex-grozav/48/4b3/127&amp;quot;}&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="teammember" data-filter="*" data-filter-exclude="*"><div class="team-member-img-wrapper"><img src="img/default/teammember.jpg" class="img-fullwidth team-member-image"></div><div class="team-member-details"><h2 class="team-member-name">John Doe</h2><h4 class="team-member-profession">Manager</h4><div class="team-member-description text-sm"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div><ul class="team-member-social list-inline"><li><a href="http://twitter.com/grozavcom"><i class="fa fa-twitter"></i></a></li><li><a href="http://facebook.com/grozavcom"><i class="fa fa-facebook"></i></a></li><li><a href="http;//plus.google.com/#"><i class="fa fa-google-plus"></i></a></li><li><a href="http://linkedin.com/pub/alex-grozav/48/4b3/127"><i class="fa fa-linkedin"></i></a></li></ul></div></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="team-member team-member-1  team-member-inverse text-center webrock-object" data-atts="{&quot;style&quot;:&quot;team-member-1&quot;,&quot;image&quot;:&quot;img/default/teammember-2.jpg&quot;,&quot;name&quot;:&quot;Lisa Kramer&quot;,&quot;profession&quot;:&quot;Web Developer&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;team-member-inverse&quot;,&quot;social&quot;:&quot;{&amp;quot;fa fa-twitter&amp;quot;:&amp;quot;http://twitter.com/grozavcom&amp;quot;,&amp;quot;fa fa-facebook&amp;quot;:&amp;quot;http://facebook.com/grozavcom&amp;quot;,&amp;quot;fa fa-google-plus&amp;quot;:&amp;quot;http;//plus.google.com/#&amp;quot;,&amp;quot;fa fa-linkedin&amp;quot;:&amp;quot;http://linkedin.com/pub/alex-grozav/48/4b3/127&amp;quot;}&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="teammember" data-filter="*" data-filter-exclude="*"><div class="team-member-img-wrapper"><img src="img/default/teammember-2.jpg" class="img-fullwidth team-member-image"></div><div class="team-member-details"><h2 class="team-member-name">Lisa Kramer</h2><h4 class="team-member-profession">Web Developer</h4><div class="team-member-description text-sm"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div><ul class="team-member-social list-inline"><li><a href="http://twitter.com/grozavcom"><i class="fa fa-twitter"></i></a></li><li><a href="http://facebook.com/grozavcom"><i class="fa fa-facebook"></i></a></li><li><a href="http;//plus.google.com/#"><i class="fa fa-google-plus"></i></a></li><li><a href="http://linkedin.com/pub/alex-grozav/48/4b3/127"><i class="fa fa-linkedin"></i></a></li></ul></div></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="team-member team-member-1  team-member-inverse text-center webrock-object" data-atts="{&quot;style&quot;:&quot;team-member-1&quot;,&quot;image&quot;:&quot;img/default/teammember-3.jpg&quot;,&quot;name&quot;:&quot;Daniel Ray&quot;,&quot;profession&quot;:&quot;Web Developer&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;team-member-inverse&quot;,&quot;social&quot;:&quot;{&amp;quot;fa fa-twitter&amp;quot;:&amp;quot;http://twitter.com/grozavcom&amp;quot;,&amp;quot;fa fa-facebook&amp;quot;:&amp;quot;http://facebook.com/grozavcom&amp;quot;,&amp;quot;fa fa-google-plus&amp;quot;:&amp;quot;http;//plus.google.com/#&amp;quot;,&amp;quot;fa fa-linkedin&amp;quot;:&amp;quot;http://linkedin.com/pub/alex-grozav/48/4b3/127&amp;quot;}&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="teammember" data-filter="*" data-filter-exclude="*"><div class="team-member-img-wrapper"><img src="img/default/teammember-3.jpg" class="img-fullwidth team-member-image"></div><div class="team-member-details"><h2 class="team-member-name">Daniel Ray</h2><h4 class="team-member-profession">Web Developer</h4><div class="team-member-description text-sm"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div><ul class="team-member-social list-inline"><li><a href="http://twitter.com/grozavcom"><i class="fa fa-twitter"></i></a></li><li><a href="http://facebook.com/grozavcom"><i class="fa fa-facebook"></i></a></li><li><a href="http;//plus.google.com/#"><i class="fa fa-google-plus"></i></a></li><li><a href="http://linkedin.com/pub/alex-grozav/48/4b3/127"><i class="fa fa-linkedin"></i></a></li></ul></div></div></div></div><div class="col  col-sm-6 col-md-3   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;col-sm-6&quot;,&quot;md&quot;:&quot;col-md-3&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="team-member team-member-1  team-member-inverse text-center webrock-object" data-atts="{&quot;style&quot;:&quot;team-member-1&quot;,&quot;image&quot;:&quot;img/default/teammember-4.jpg&quot;,&quot;name&quot;:&quot;Alice Lane&quot;,&quot;profession&quot;:&quot;Web Designer&quot;,&quot;description&quot;:&quot;&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&amp;lt;/p&amp;gt;&quot;,&quot;theme&quot;:&quot;team-member-inverse&quot;,&quot;social&quot;:&quot;{&amp;quot;fa fa-twitter&amp;quot;:&amp;quot;http://twitter.com/grozavcom&amp;quot;,&amp;quot;fa fa-facebook&amp;quot;:&amp;quot;http://facebook.com/grozavcom&amp;quot;,&amp;quot;fa fa-google-plus&amp;quot;:&amp;quot;http;//plus.google.com/#&amp;quot;,&amp;quot;fa fa-linkedin&amp;quot;:&amp;quot;http://linkedin.com/pub/alex-grozav/48/4b3/127&amp;quot;}&quot;,&quot;animation&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="teammember" data-filter="*" data-filter-exclude="*"><div class="team-member-img-wrapper"><img src="img/default/teammember-4.jpg" class="img-fullwidth team-member-image"></div><div class="team-member-details"><h2 class="team-member-name">Alice Lane</h2><h4 class="team-member-profession">Web Designer</h4><div class="team-member-description text-sm"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div><ul class="team-member-social list-inline"><li><a href="http://twitter.com/grozavcom"><i class="fa fa-twitter"></i></a></li><li><a href="http://facebook.com/grozavcom"><i class="fa fa-facebook"></i></a></li><li><a href="http;//plus.google.com/#"><i class="fa fa-google-plus"></i></a></li><li><a href="http://linkedin.com/pub/alex-grozav/48/4b3/127"><i class="fa fa-linkedin"></i></a></li></ul></div></div></div></div></div></div></div></div>';

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
    $object = new WRTeamBlock1();
    $webrock->add_object($object);
}
