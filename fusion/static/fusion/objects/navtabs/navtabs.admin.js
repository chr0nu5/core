/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'navtabs',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="navtabs"]').sortable({
                items: "> .webrock-content > div",
                cursor: "move",
                axis: 'y'
            });
        }, // Object Run Function
        function() {
        }
)