/* =============================================
 * Object Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'videobackground',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="videobackground"]').sortable({
                cursor: 'drag',
                axis: 'y',
                items: '[data-shortcode]'
            })
        }, // Object Run Function
        function() {
            $('.video-bg').each(function() {
                var mp4 = $(this).attr('data-video-mp4');
                var ogv = $(this).attr('data-video-ogv');
                var webm = $(this).attr('data-video-webm');
                var jpg = $(this).attr('data-video-jpg');

                var settings = {};

                if (typeof mp4 != 'undefined')
                    settings['mp4'] = mp4;
                if (typeof ogv != 'undefined')
                    settings['ogv'] = ogv;
                if (typeof webm != 'undefined')
                    settings['webm'] = webm;
                if (typeof jpg != 'undefined')
                    settings['jpg'] = jpg;
                settings['scale'] = true;
                settings['zIndex'] = 0;

                $(this).videoBG(settings);
            });
        }
)