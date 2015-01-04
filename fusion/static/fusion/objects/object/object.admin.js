/* =============================================
 * Object Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'object',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $(".object").sortable({
                cursor: "move",
                axis: 'y',
                connectWith: '.object'
            });
        }, // Object Run Function
        function() {
        }
)