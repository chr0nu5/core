/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'owlcarousel',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="owlcarousel"]').sortable({
                items: "[data-shortcode='owlcarousel-slide']",
                cursor: "move"
            });
        }, // Object Run Function
        function() {
        }
)