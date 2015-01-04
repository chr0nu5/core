/* =============================================
 * Object Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'youtubebackground',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="youtubebackground"]').sortable({
                cursor: 'drag',
                axis: 'y',
                items: '[data-shortcode]'
            })
        }, // Object Run Function
        function() {
            $('.video-bg-youtube').each(function() {
                var url = $(this).attr('data-youtube-video');

                var settings = {};

                if (typeof url != 'undefined')
                    settings['videoId'] = url;

                $(this).tubular(settings);
            });
        }
)