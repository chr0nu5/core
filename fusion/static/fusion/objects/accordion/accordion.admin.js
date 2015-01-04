/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'accordion',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="accordion"]').sortable({
                items: "> .webrock-content > div",
                cursor: "move",
                axis: 'y'
            });
        }, // Object Run Function
        function() {
        }
)