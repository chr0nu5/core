/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'owlcarousel-slide',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="owlcarousel-slide"]').sortable({
                items: "[data-shortcode]",
                cursor: "move"
            });
        }, // Object Run Function
        function() {
        }
)

// Disable from default list
webrock.addListFilter('owlcarousel-slide');