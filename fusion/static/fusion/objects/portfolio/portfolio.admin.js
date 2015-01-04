/* =============================================
 * Portfolio Admin
 * 
 * addObject(id, sortable, run);
 * ============================================= */
webrock.addObject(
        'portfolio',
        function() {
            /* =============================================
             * Object Sortable
             * 
             * @used for applying a sortable filter on the object
             *       and making its contents drag & drop compatible
             * ============================================= */
            $('[data-shortcode="portfolio"]').sortable({
                items: "[data-shortcode='portfolio-project']",
                cursor: "move"
            });
        }, // Object Run Function
        function() {
            /***********************************
             Portfolio Isotope
             ************************************/
            $('.portfolio').each(function() {
                var $this = $(this);
                imagesLoaded($(this), function() {
                    $this.isotope({
                        itemSelector: '.portfolio-project',
                        layoutMode: 'masonry',
                        transitionDuration: '0.7s'
                    });
                    setTimeout(function() {
                        $this.isotope();
                    }, 500)
                });

            });

            $('.portfolio-project-lightbox').swipebox({
                useCSS: true, // false will force the use of jQuery for animations
                useSVG: true, // false to force the use of png for buttons
                hideBarsOnMobile: true
            });

            /***********************************
             Portfolio Isotope Filtering
             ************************************/
            $('.portfolio-filter').each(function() {
                var $this = $(this);
                var $listItem = $('li a', $this)
                var $target = $($this.attr('data-filter-target'));
                $listItem.click(function() {
                    var $a = $(this);
                    var filter = $a.attr('data-filter-value');
                    if (!$a.hasClass('active')) {
                        $listItem.removeClass('active');
                        $a.addClass('active')
                        $target.isotope({filter: filter});
                    }
                });
            });
        }
)