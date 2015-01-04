<?php

/* =============================================
 * WebRockInput Class
 * 
 * @type global
 * @role object handling interface
 * ============================================= */

interface WebRockInput {
    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config();

    /* ===
     * Generate
     * 
     * @role function used to generate
     *       the actual object html
     * 
     * @atts {array}
     * @content {string}
     * 
     * @return {string}
     * === */

    function create($name, $values = null, $default = null);
}
