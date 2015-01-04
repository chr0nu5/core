/* =============================================
 * Object Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'header-1',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="header-1"]').sortable({
                cursor: 'drag',
                items: '[data-shortcode]'
            })
        }, // Object Run Function
        function() {
        }
)