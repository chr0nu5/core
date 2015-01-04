/* =============================================
 * Object Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'solidbackground',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="solidbackground"]').sortable({
                cursor: 'drag',
                axis: 'y',
                items: '[data-shortcode]'
            })
        }, // Object Run Function
        function() {
        }
)