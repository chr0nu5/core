<?php

/* =============================================
 * FusionCOREObject Class
 * 
 * @type global
 * @role object handling interface
 * ============================================= */

interface WebRockObject {
    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config();

    /* ===
     * Attributes
     * 
     * @role returns the object attributes
     *       as an array
     * @used to create inputs of chosen type and
     *       generate the object creation form
     * === */

    function attributes();

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

    function create($atts, $content = null);
}
