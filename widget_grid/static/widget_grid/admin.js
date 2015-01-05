/* =============================================
 * Grid Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'grid',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $(".webrock-sandbox").sortable({
                cursor: "move"
            });

            $('[data-shortcode="container"]').sortable({
                items: '[data-shortcode="row"]',
                cursor: "move",
                axis: 'y',
                connectWith: '[data-shortcode="container"]'
            });

            $('[data-shortcode="row"]').sortable({
                items: '[data-shortcode="column"]',
                cursor: "move",
                axis: 'xy',
                connectWith: '[data-shortcode="row"]'
            });

            $('[data-shortcode="column"]').sortable({
                items: "[data-shortcode]",
                cursor: "move",
                connectWith: '[data-shortcode="column"]'
            });
        }, // Object Run Function
        function() {
        }
)