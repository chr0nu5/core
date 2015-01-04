/* =============================================
 * Add Icon Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'icon',
        function($field) {
            // getValue
            var value = $(':text', $field).val();
            return value;
        },
        function($field, value) {
            // setValue
            $(':text', $field).val(value);

            var $icons = $('.webrock-icon-input', $field);
            $icons.each(function() {
                var $i = $('i', $(this));
                if ($i.attr('class') == value)
                    $(this).addClass('active');
            })

            $('.webrock-icon-show', $field).html('<i class="' + value + '"></i>');
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).on('change', function() {
                self.updateObject();
            })

            // show / hide icons
            $('.webrock-icon-show, :text', $field).on('click', function() {
                var $list = $('.webrock-icon-list', $field);

                if ($('.webrock-icon-list', $field).is(':visible')) {
                    $('.webrock-icon-show', $field).html('<i class="' + $(':text', $field).val() + '"></i>');
                } else {
                    $('.webrock-icon-show', $field).html('<i class="' + $(':text', $field).val() + '"></i> Hide Icons');
                }

                $list.toggle(500);
            });

            // set value on icon click
            var $icons = $('.webrock-icon-input', $field);
            $icons.on('click', function() {
                var $i = $('i', $(this));
                var iclass = $i.attr('class');

                $icons.removeClass('active');
                $(this).addClass('active');
                $(':text', $field).val(iclass).change();

                $('.webrock-icon-show', $field).html('<i class="' + iclass + '"></i> Hide Icons');
            })

        }
)
