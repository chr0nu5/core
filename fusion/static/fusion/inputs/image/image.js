/* =============================================
 * Add Text Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
    'image',
    function ($field) {
        // getValue
        var value = $(':text', $field).val();
        return value;
    },
    function ($field, value) {
        // setValue
        var img = '<img src="' + value + '" class="img-responsive"/>';
        $(':text', $field).before(img)
        $(':text', $field).val(value);
    },
    function ($field) {
        // initInput
        var self = this;

        $('.webrock-images-browse', $field).on('click', function () {
            $image_browse_target = $field;
            $('.webrock-image-browser-background').show(0)
            $('.webrock-image-browser-background').addClass('visible');
            $('body').addClass('overflow-none');
        })

        var UPLOAD_FOLDER = 'img/';

        $(':text', $field).on('change', function () {
            var img = '<img src="' + $(this).val() + '" class="img-responsive"/>';
            $('img', $field).remove();
            $(this).before(img)
            self.updateObject();
        })

        $('.webrock-image-upload', $field).fileupload({
            dataType: 'json',
            done: function (e, data) {
                var images = '';
                $.each(data.result.files, function (index, file) {
                    images += UPLOAD_FOLDER + file.name;
                });
                $(':text', $field).val(images).trigger("change");

                var img_browser_item = '<div class="webrock-browse-item">'
                    + '<a class="webrock-browse-item-remove" data-image-url="' + images + '" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>'
                    + '<a class="webrock-browse-item-overlay" data-image-url="' + images + '">'
                    + '<p class="webrock-browse-item-text">Choose Image</p>'
                    + '</a>'
                    + '<img class="webrock-browse-item-image" src="' + images.replace('img/', 'img/thumbnail/') + '"/>'
                    + '</div>';
                $('.webrock-image-browser-content').append(img_browser_item).masonry('appended', img_browser_item);
                $('.webrock-browse-item-notfound').remove();
            }
        });

    }
)
