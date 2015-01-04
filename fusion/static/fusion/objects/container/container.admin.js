/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'container',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="container"]').sortable({
                items: '[data-shortcode="row"]',
                cursor: "move",
                axis: 'y',
                connectWith: '[data-shortcode="container"]'
            });
        }, // Object Run Function
        function() {
        }
)