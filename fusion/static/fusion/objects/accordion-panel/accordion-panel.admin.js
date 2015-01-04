/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'accordion-panel',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="accordion-panel"]').sortable({
                items: "[data-shortcode]",
                cursor: "move",
                axis: 'y'
            });
        }, // Object Run Function
        function() {
        }
)

// Disable from default list
webrock.addListFilter('accordion-panel');