/* =============================================
 * Row Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'gmaps',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
        }, // Object Run Function
        function() {
            ;
            $('.maplace').each(function() {
                var lat = parseFloat($(this).attr('data-lat'));
                var lon = parseFloat($(this).attr('data-lon'));
                var zoom = parseFloat($(this).attr('data-zoom'));
                var id = '#' + $(this).attr('id');

                new Maplace({
                    map_div: id,
                    locations: [{
                            lat: lat,
                            lon: lon,
                            zoom: zoom
                        }],
                    map_options: {
                        set_center: [lat, lon],
                        zoom: zoom
                    }
                }).Load();
            });
        }
)