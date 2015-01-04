<?php

/* =============================================
 * WebRock Class
 * 
 * @type global
 * @role file handling and content generator
 * ============================================= */

class WebRock
{
    /* ===
     * WebRock Plugin Unique Instance
     * 
     * @since 1.0.0
     * @var {object}
     * === */

    protected static $instance = null;


    /* ===
     * WebRock Inputs
     * 
     * @since 1.0.0
     * @var {object array}
     * === */
    protected static $inputs = array();

    /* ===
     * WebRock Objects
     * 
     * @since 1.0.0
     * @var {object array}
     * === */
    protected static $objects = array();

    /* ===
     * WebRock Styles and Scripts
     * 
     * @since 1.0.0
     * @var {object array}
     * @used for including styles and scripts
     *       inside the head tag without
     *       any duplicates
     * === */
    protected static $styles = array();
    protected static $scripts = array();

    protected static $build_styles = array();
    protected static $build_scripts = array();


    /* ===
     * WebRock Settings
     * 
     * @since 1.0.0
     * @var {object}
     * @used for generating settings inputs
     * === */
    protected static $settings = null;

    /* ===
     * WebRock Order Sorting
     * 
     * @since 1.0.0
     * @var {object}
     * @options ASC DESC DEFAULT
     * === */
    protected static $objectOrder = 'ASC';

    /* ===
     * WebRock Get Instance
     * 
     * @role returns an already created instance or 
     *       creates a new instance at runtime
     * === */

    public function get_instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }


    // Initialize Demo
    protected static $demo = false;
    protected static $purchase_link = null;


    /* ===
     * WebRock Constructor
     * 
     * @role adds all the object config and function files
     *       adds all the input files
     *       generates required input fields
     * === */

    public function __construct()
    {

    }

    /* ===
     * Add Object
     * 
     * @role adds a new object to the interface
     * === */

    public function add_object($object)
    {
        self::$objects[$object->shortcode] = $object;
    }

    /* ===
     * Add Input
     * 
     * @role adds a new object to the interface
     * === */

    public function add_input($input)
    {
        self::$inputs[$input->type] = $input;
    }

    /* ===
     * Add Settings
     * 
     * @role adds a new object to the interface
     * === */

    public function settings($settings)
    {
        self::$settings = $settings;
    }

    /* ===
     * Shortcode Output HTML
     * 
     * @role adds a new object to the interface
     * === */

    public function shortcode($shortcode, $atts, $content)
    {
        return self::$objects[$shortcode]->create($atts, $content);
    }

    /* ===
     * Initialize Framework
     * 
     * @role enqueue added inputs and objects
     * === */

    public function init_framework()
    {
        /* ===
         * Object Sorting
         *
         * based on config varbiable $objectOrder
         * === */

        function cmpASC($a, $b)
        {
            $aconfig = $a->config();
            $bconfig = $b->config();
            return $aconfig['order'] > $bconfig['order'];
        }

        function cmpDESC($a, $b)
        {
            $aconfig = $a->config();
            $bconfig = $b->config();
            return $aconfig['order'] < $bconfig['order'];
        }

        if (self::$objectOrder == 'ASC')
            usort(self::$objects, "cmpASC");
        else if (self::$objectOrder == 'DESC')
            usort(self::$objects, "cmpDESC");

        /* ===
         * Object and Input Enqueue
         * === */
        self::enqueue_inputs();
        self::enqueue_objects();
    }

    /* ===
     * Set Demo
     * === */
    public function demo($purchase_link)
    {
        self::$demo = true;
        self::$purchase_link = $purchase_link;
    }

    /* ===
     * Create Styles / Links
     * 
     * @role go through all the objects and
     *       add generate required links for each
     * === */

    public function styles()
    {
        $html = '';
        foreach (self::$styles as $style) {
            $html .= $style;
        }
        echo $html;
    }


    /* ===
     * Create Scripts
     * 
     * @role go through all the objects and
     *       add generate required scripts for each
     * === */

    public function scripts()
    {
        $html = '';
        foreach (self::$scripts as $script) {
            $html .= $script;
        }
        echo $html;
    }

    /* ===
     * Build Styles / Scripts
     *
     * @role go through all the objects and
     *       add generate required links for each
     * === */

    public function build_styles()
    {
        $html = '';
        foreach (self::$build_styles as $style) {
            $html .= $style;
        }
        echo $html;
    }

    public function build_scripts()
    {
        $html = '';
        foreach (self::$build_scripts as $script) {
            $html .= $script;
        }
        echo $html;
    }

    /* ===
     * Enqueue Objects
     * 
     * @role generate scripts, styles and
     *       callbacks of the objects 
     * === */

    private function enqueue_objects()
    {

        echo webrock_hook('enqueue_objects', NULL, false);

        foreach (self::$objects as $object) {
            $shortcode = $object->shortcode;
            $config = $object->config();

            // Enqueue Object Styles
            if (isset($config['styles-admin']))
                self::enqueue_admin_style(
                    $config['styles-admin']
                );

            // Enqueue Object Styles
            if (isset($config['styles']))
                self::enqueue_style(
                    $config['styles'], $shortcode
                );

            // Enqueue Admin Script
            if (isset($config['scripts-admin']))
                self::enqueue_admin_script(
                    $config['scripts-admin']
                );

            // Enqueue Plugin Scripts
            if (isset($config['scripts']))
                self::enqueue_script(
                    $config['scripts'], $shortcode
                );
        }
    }

    /* ===
     * Enqueue Inputs
     * 
     * @role generate scripts, styles and
     *       callbacks of the objects 
     * === */

    private function enqueue_inputs()
    {
        foreach (self::$inputs as $input) {
            $type = $input->type;
            $config = $input->config();

            // Enqueue Object Styles
            if (isset($config['styles']))
                self::enqueue_admin_style(
                    $config['styles']
                );

            // Enqueue Admin Script
            if (isset($config['scripts']))
                self::enqueue_admin_script(
                    $config['scripts'], WEBROCK_VERSION
                );
        }
    }

    /* ===
     * Enqueue Style
     * === */

    private function enqueue_style($styles, $shortcode)
    {
        foreach ($styles as $key => $path) {
            self::$styles[$key] = '<link '
                . 'href="' . $path . '" '
                . 'id="' . $key . '" '
                . 'data-shortcode-target="' . $shortcode . '" '
                . 'rel="stylesheet" '
                . 'class="' . WEBROCK . '_style">';

            self::$build_styles[$key] = self::$styles[$key];
        }
    }

    /* ===
     * Enqueue Script
     * === */

    private function enqueue_script($scripts, $shortcode)
    {
        foreach ($scripts as $key => $path) {
            self::$scripts[$key] = '<script '
                . 'data-src="' . $path . '" '
                . 'id="' . $key . '" '
                . 'data-shortcode-target="' . $shortcode . '" '
                . 'class="' . WEBROCK . '_script"'
                . '></script>';

            self::$build_scripts[$key] = '<script '
                . 'src="' . $path . '" '
                . 'id="' . $key . '" '
                . 'data-shortcode-target="' . $shortcode . '" '
                . 'class="' . WEBROCK . '_script"'
                . '></script>';
        }
    }

    /* ===
     * Enqueue Style
     * === */

    private function enqueue_admin_style($styles)
    {
        foreach ($styles as $key => $path) {
            self::$styles[$key] = '<link '
                . 'href="' . $path . '" '
                . 'id="' . $key . '" '
                . 'rel="stylesheet" '
                . 'class="' . WEBROCK . '_admin_style">';
        }
    }

    /* ===
     * Enqueue Script
     * === */

    private function enqueue_admin_script($scripts)
    {
        foreach ($scripts as $key => $path)
            self::$scripts[$key] = '<script '
                . 'src="' . $path . '" '
                . 'id="' . $key . '" '
                . 'class="' . WEBROCK . '_admin_script"'
                . '></script>';
    }

    /* ===
     * Create Body
     * 
     * @role go through all the objects and
     *       add generate required fields for each
     * === */

    public function body()
    {
        global $grozav;
        global $product_id;
        ?>

        <!-- 
        * ===
        * WebRock Activities
        *
        * @role activate one of the WebRock Activities
        * ===
        -->
        <section class="webrock-activities webrock-right">
            <div class="webrock-activity webrock-activity-add-object">
                <a href="javascript:void(0);">
                    <i class="fa fa-plus fa-2x"></i>

                    <p class="webrock-activity-text">Add Object</p>
                </a>
            </div>
            <div class="webrock-activity webrock-activity-preview">
                <a href="javascript:void(0);">
                    <i class="fa fa-eye fa-2x"></i>

                    <p class="webrock-activity-text">Preview</p>
                </a>
            </div>
            <div
                class="webrock-activity webrock-activity-preview-trigger webrock-activity-preview-desktop hidden active">
                <a href="javascript:void(0);">
                    <i class="fa fa-desktop fa-2x"></i>

                    <p class="webrock-activity-text">Desktop</p>
                </a>
            </div>
            <div class="webrock-activity webrock-activity-preview-trigger webrock-activity-preview-laptop hidden">
                <a href="javascript:void(0);">
                    <i class="fa fa-laptop fa-2x"></i>

                    <p class="webrock-activity-text">Laptop</p>
                </a>
            </div>
            <div class="webrock-activity webrock-activity-preview-trigger webrock-activity-preview-tablet hidden">
                <a href="javascript:void(0);">
                    <i class="fa fa-tablet fa-2x"></i>

                    <p class="webrock-activity-text">Tablet</p>
                </a>
            </div>
            <div class="webrock-activity webrock-activity-preview-trigger webrock-activity-preview-mobile hidden">
                <a href="javascript:void(0);">
                    <i class="fa fa-mobile-phone fa-2x"></i>

                    <p class="webrock-activity-text">Phone</p>
                </a>
            </div>
            <div class="webrock-activity webrock-activity-save">
                <a href="javascript:void(0);">
                    <i class="fa fa-save fa-2x"></i>

                    <p class="webrock-activity-text">Save Page</p>
                </a>
            </div>

            <div class="webrock-activity webrock-activity-bottom">
                <a href="builder/index.php">
                    <img src="builder/img/logo.white.single.png" width="35" class="webrock-activity-img"/>

                    <p class="webrock-activity-text">Grozav</p>
                </a>
            </div>
        </section>

        <!-- 
        * ===
        * WebRock Framework
        *
        * @role contains the main webrock activity pages
        * ===
        -->
        <section class="webrock webrock-right">
        <div class="webrock-toggle-fullscreen">
            <a href="javascript:void(0);">
                <i class="fa fa-expand"></i>
            </a>
        </div>

        <!--
        * ===
        * WebRock Page
        * ===
        -->
        <div class="webrock-page" id="webrock-list-page">
            <div class="webrock-page-content">
                <!--
                * ===
                * WebRock Heading
                * ===
                -->
                <div class="webrock-heading webrock-dark">
                    <h1 class="webrock-title">
                        <i class="fa fa-plus-circle"></i> Add Object
                    </h1>

                    <p class="webrock-subtitle">
                        Add a new WebRock object to the page from the list below or search for a specific object.
                    </p>
                </div>

                <!--
                * ===
                * WebRock Category Filter
                * ===
                -->
                <input class="webrock-list-search"
                       placeholder="Search for...">

                <!--
                * ===
                * WebRock Body
                * ===
                -->
                <div class="webrock-body webrock-light">
                    <ul class="webrock-list list-unstyled">
                        <?php
                        foreach (self::$objects as $object) {
                            $config = $object->config();
                            $shortcode = $object->shortcode;

                            $li = '<li data-search-keywords="' . $config['keywords'] . '" '
                                . 'data-shortcode="' . $shortcode . '">'
                                . '<a href="javascript:void(0);" class="webrock-title">'
                                . '<span class="webrock-title-text">'
                                . '<i class="' . $config['icon'] . '"></i> '
                                . $config['title']
                                . '</span>'
                                . (isset($config['preview']) ?
                                    '<div class="webrock-list-preview">' . $config['preview'] . '</div>' : '')
                                . '</a>'
                                . '</li>';

                            echo $li;
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!--
            * ===
            * WebRock Footer
            * ===
            -->
            <div class="webrock-footer webrock-dark">
                <a class="webrock-cancel" href="javascript:void(0);">Close</a>
            </div>
        </div>

        <!--
        * ===
        * WebRock Page
        * ===
        -->
        <div class="webrock-page" id="webrock-add-page">
            <div class="webrock-page-content">
                <!--
                * ===
                * WebRock Heading
                * ===
                -->
                <div class="webrock-heading webrock-dark">
                    <h1 class="webrock-title">
                        <i class="fa fa-plus-circle"></i> Object
                    </h1>

                    <p class="webrock-subtitle">
                    </p>
                </div>

                <!--
                * ===
                * WebRock Category Filter
                * ===
                -->
                <select class="webrock-input-categories webrock-select">

                </select>

                <!--
                * ===
                * WebRock Body
                * ===
                -->
                <div class="webrock-body webrock-light">
                </div>
            </div>
            <!--
            * ===
            * WebRock Footer
            * ===
            -->
            <div class="webrock-footer webrock-dark">
                <a class="webrock-saveEdit" href="javascript:void(0);">Save</a>
                <a class="webrock-undoEdit" href="javascript:void(0);">Cancel</a>
            </div>
        </div>

        <?php
        foreach (self::$objects as $object) {
            $shortcode = $object->shortcode;
            $config = $object->config();
            $attributes = $object->attributes();

            $attcategories = array();

            foreach ($attributes as $att) {
                if (!in_array($att['category'], $attcategories) && $att['category'] != null)
                    array_push($attcategories, $att['category']);
            }
            ?>
            <!--
            * ===
            * WebRock Page
            * ===
            -->
            <div class="webrock-page"
                 data-shortcode-page="<?= $shortcode ?>"
                <?php
                $filter = $config['filter'] != '*' ? $config['filter']['values'] : '*';
                $filterexclude = $config['filter'] != '*' ? $config['filter']['exclude'] : '*';
                ?>
                 data-filter="<?= $filter ?>"
                 data-filter-exclude="<?= $filterexclude ?>"
                >
                <div class="webrock-page-content">
                    <!--
                    * ===
                    * WebRock Heading
                    * ===
                    -->
                    <div class="webrock-heading webrock-dark">
                        <h1 class="webrock-title">
                            <i class="<?= $config['icon'] ?>"></i> <?= $config['title'] ?>
                        </h1>

                        <p class="webrock-subtitle">
                            <?= $config['description'] ?>
                        </p>
                    </div>

                    <!--
                    * ===
                    * WebRock Category Filter
                    * ===
                    -->
                    <?php
                    if (sizeof($attcategories) > 0) {
                        ?>
                        <select class="webrock-input-categories webrock-select">
                            <option value="*">All</option>
                            <?php
                            foreach ($attcategories as $category) {
                                echo '<option value="' . $category . '">' . $category . '</option>';
                            }
                            ?>
                        </select>
                    <?php
                    }
                    ?>

                    <!--
                    * ===
                    * WebRock Body
                    * ===
                    -->
                    <div class="webrock-body webrock-light">
                        <?php
                        if ($attributes) {
                            foreach ($attributes as $name => $attribute) {
                                $type = $attribute['type'];
                                $values = isset($attribute['values']) ? $attribute['values'] : null;
                                $default = isset($attribute['default']) ? $attribute['default'] : null;
                                echo '<div class="webrock-field" '
                                    . 'data-type="' . $type . '" '
                                    . 'data-category="' . $attribute['category'] . '" '
                                    . 'data-name="' . $name . '" '
                                    . 'data-required="' . ($attribute['required'] ? '1' : '0') . '">';
                                echo '<div class="webrock-field-details">';

                                echo '<' . ($type == 'separator' ? 'h2' : 'h3') . ' class="webrock-field-title">' . $attribute['title'];
                                if ($attribute['required']) {
                                    echo '<span class="webrock-required"> *</span>';
                                }
                                echo '</' . ($type == 'separator' ? 'h2' : 'h3') . '>';
                                echo '<p class="webrock-field-description">' . $attribute['description'] . '</p>';
                                echo '</div>';
                                echo self::$inputs[$type]->create($name, $values, $default);
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </section>
    <?php
    }

    /* ===
     * Create Image Browser
     * 
     * @role go through all the objects and
     *       add generate required fields for each
     * === */

    public function image_browser()
    {
        global $user_id;
        $user_folder = $user_id;

        if (self::$demo == true) {
            $user_folder = 'default';
        }
        ?>
        <div class="webrock-image-browser-background">
            <div class="webrock-image-browser-close">
                <i class="fa fa-times"></i>
            </div>
            <div class="webrock-image-browser">
                <div class="webrock-image-browser-content">
                    <?php
                    //path to directory to scan
                    $directory = "img/";

                    //get all image files with a .jpg extension.
                    $images = glob($directory . "*.*");

                    if (is_array($images) && sizeof($images) > 0) {
                        foreach ($images as $image) {

                            echo '<div class="webrock-browse-item">';
                            echo '<a class="webrock-browse-item-remove" data-image-url="' . $image . '" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>';
                            echo '<a href="javascript:void(0);" '
                                . 'class="webrock-browse-item-overlay" '
                                . 'data-image-url="' . $image . '"'
                                . '>'
                                . '<p class="webrock-browse-item-text">Choose Image</p>'
                                . '</a>'
                                . '<img class="webrock-browse-item-image" src="' . str_replace('/', '/thumbnail/', $image) . '"/>'
                                . '</div>';
                        }
                    } else {
                        echo '<h4 class="webrock-browse-item-notfound text-center">You haven\'t uploaded any images yet.</h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }

}
