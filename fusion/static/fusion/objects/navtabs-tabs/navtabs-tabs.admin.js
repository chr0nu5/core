/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'navtabs-tabs',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
        }, // Object Run Function
        function() {
        }
)

// Disable from default list
webrock.addListFilter('navtabs-tabs');