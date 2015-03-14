<?php

/**
 * Plugin Name: WebRock
 * Plugin URI: http://webrock.grozav.com
 * Description: @TODO
 * Version: 1.0.0
 * Author: Alex Grozav
 * Author URI: http://grozav.com
 * License: Commercial CodeCanyon License
 */
/* =============================================
 * Class Dependencies
 * ============================================= */
/* ===
 * FusionCORE Hooks
 * === */
require_once $webrock_folder . 'webrock.hooks.php';
/* ===
 * FusionCORE
 * === */
require_once $webrock_folder . 'webrock.php';
/* ===
 * FusionCORE Input Interface
 * === */
require_once $webrock_folder . 'webrock.input.php';
/* ===
 * FusionCORE Object Interface
 * === */
require_once $webrock_folder . 'webrock.object.php';

/* =============================================
 * Global Functions
 * ============================================= */

/* ===
 * Objects Directory
 * 
 * @since 1.0.0
 * @used identifier
 * @var {string}
 * === */

function objects_url() {
    return 'objects/';
}

/* ===
 * Inputs Directory
 * 
 * @since 1.0.0
 * @used identifier
 * @var {string}
 * === */

function inputs_url() {
    return 'inputs/';
}

/* ===
 * Include Objects
 * 
 * @role loop through object folders
 *       and include all the files as plugins
 * === */

function include_objects() {
    global $webrock;

    // Get Config
    $object_config_files = "objects/*/*.php";
    $files = glob($object_config_files);
    if (is_array($files) && count($files) > 0) {

        foreach ($files as $file) {
            require_once($file);
        }
    }
}

/* ===
 * Include Input Types
 * 
 * @role loop through input folders
 *       and include all the files as plugins
 * === */

function include_inputs() {
    global $webrock;

    // Get Config
    $input_function_files = "inputs/*/*.php";
    $files = glob($input_function_files);
    if (is_array($files) && count($files) > 0) {
        foreach ($files as $file) {
            require_once($file);
        }
    }
}

/* ===
 * Include Settings File
 * 
 * @role get settings page and add to framework
 * === */

function include_settings() {
    global $webrock;

    // Get Settings
    if (file_exists('webrock/webrock.settings.php'))
        require_once('webrock/webrock.settings.php');
}

/* ===
 * Array Replace
 * 
 * @role define array_replace in case
 *       php verison doesn't support it
 * === */
if (!function_exists('array_replace')) {

    function array_replace() {
        $array = array();
        $n = func_num_args();

        while ($n-- > 0) {
            $array+=func_get_arg($n);
        }
        return $array;
    }

}

/* ===
 * Shortcode Attributes
 * 
 * @role output each of the key => value pair
 *       as unique variables
 * === */

function webrock_atts($default, $input) {
    $variables = array();

    foreach ($default as $key => $value) {
        $variables['key'] = '';
    }

    if (isset($input)) {
        return array_replace($variables, $input);
    } else {
        return $variables;
    }
}

if (!function_exists('shortcode_atts')) {

    function shortcode_atts($default, $input) {
        if (isset($input)) {
            return array_replace($default, $input);
        } else {
            return $default;
        }
    }

}


/* ===
 * Attribute Decode
 * 
 * @role used for removing magic quotes
 *       in WP Only
 * === */

function webrock_atts_decode($input) {
    return $input;
}

/* ===
 * Do Shortcode
 * 
 * @role return content wrapped in webrock
 *       identifier
 * === */

function webrock_do_shortcode($content) {
    return '<div class="webrock-content">' . $content . '</div>';
}

/* =============================================
 * Run Framework
 * ============================================= */
/* ===
 * Create WebRock
 * === */
$webrock = new WebRock();

/* ===
 * Include Inputs
 * === */
include_inputs();

/* ===
 * Include Objects
 * === */
include_objects();

/* ===
 * Include Settings
 * === */
include_settings();

/* ===
 * Initialize Framework
 * === */
$webrock->init_framework();

