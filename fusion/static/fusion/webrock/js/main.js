var $image_browse_target;

$('document').ready(function() {


    /* ===
     * Init Image Broswer
     * === */
    var $imgbrowser = $('.webrock-image-browser-content');

    /* ===
     * Bind Loader
     * === */
    $(window).load(function() {
        if ($('.webrock-loader').length) {
            setTimeout(function() {
                $('body').removeClass('webrock-loading')
                $('.webrock-loader').fadeOut(1000, function() {
                    $('.webrock-loader').remove();
                })
                $('.webrock-activities').addClass('animated fadeInRightBig');
            }, 2000)
        }

        $imgbrowser.masonry({
            itemSelector: '.webrock-browse-item',
            transitionDuration: '0.7s',
            gutter: 0
        });
        $imgbrowser.masonry('bindResize')

        setTimeout(function() {
            $imgbrowser.masonry();
        }, 500)
    })


    /* ===
     * Hide Image Broswer
     * === */
    function hide_image_browser() {
        $('.webrock-image-browser-background').removeClass('visible');
        $('body').removeClass('overflow-none');
        setTimeout(function() {
            $('.webrock-image-browser-background').hide(0)
        }, 700)
    }

    $('.webrock-image-browser-close').on('click', function() {
        hide_image_browser();
    })

    $('.webrock-image-browser-background').on('click', function(e) {
        if (e.target !== this) {
            hide_image_browser();
        }
    })

    /* ===
     * Image Browser Set URL
     * === */
    $('.webrock-browse-item-overlay').on('click', function() {
        var src = $(this).attr('data-image-url');
        $('input[type="text"]', $image_browse_target).val(src).change();
        hide_image_browser();
    })

    /* ===
     * Image Browser Set URL
     * === */
    $('.webrock-image-browser').on('click', '.webrock-browse-item-remove', function(e) {
        var $parent = $(this).parent();
        var imgurl = $(this).attr('data-image-url');
        if (confirm('Are you sure you want to delete this image?'))
            $.ajax({
                type: 'POST',
                url: 'webrock/includes/webrock.delete.image.php',
                data: {
                    imgurl: imgurl
                },
                success: function(data) {
                    if (data == 'success') {
                        $parent.fadeOut(500, function() {
                            $parent.remove()
                            $imgbrowser.masonry();

                            if ($('.webrock-browse-item').length == 0) {
                                $('.webrock-image-browser-content').append('<h4 class="webrock-browse-item-notfound text-center">You haven\'t uploaded any images yet.</h4>');
                            }

                        });
                    }
                }
            })
        e.stopPropagation();
    })


})