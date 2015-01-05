/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'row',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="row"]').sortable({
                items: '[data-shortcode="column"]',
                cursor: "move",
                connectWith: '[data-shortcode="row"]'
            });
        }, // Object Run Function
        function() {
        }
)