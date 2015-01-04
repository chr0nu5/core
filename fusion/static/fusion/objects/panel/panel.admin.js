/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'progressbar',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="panel"]').sortable({
                items: "[data-shortcode]",
                cursor: "move",
                axis: 'y',
                connectWith: '[data-shortcode="panel"]'
            });
        }, // Object Run Function
        function() {
        }
)