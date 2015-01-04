/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'link',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="link"]').sortable({
                items: '[data-shortcode]',
                cursor: "move",
                connectWith: '[data-shortcode="link"]'
            });
        }, // Object Run Function
        function() {
        }
)