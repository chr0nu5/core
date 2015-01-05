/* =============================================
 * Column Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'column',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="column"]').sortable({
                items: "[data-shortcode]",
                cursor: "move",
                connectWith: '[data-shortcode="column"]'
            });
        }, // Object Run Function
        function() {
        }
)