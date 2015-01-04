/* =============================================
 * Add Text Repeater Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'text-repeater',
        function($field) {
            // getValue
            var value = new Array();

            $(':text', $field).each(function() {
                value.push($(this).val());
            });

            return JSON.stringify(value);
        },
        function($field, value) {
            // setValue
            var name = $field.attr('data-name');
            var html = '';

            value = $.parseJSON(unescapeHtml(value));
            for (var i = 0; i < value.length; i++) {
                html += '<input type="text" class="form-control" name="' + name + '" value="' + value[i] + '"/>';
            }
            
            // replace existing fields
            $(':text', $field).remove();
            $('.webrock-text-repeater', $field).before(html)
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).on('change', function() {
                self.updateObject();
            })  
            
            // add remove button
            $(':text', $field).each(function() {
                var removeField = '<a href="javascript:void(0);" class="delete-text-repeater"><i class="fa fa-times"></i></a>';
                $(this).after(removeField)
            })

            // create new
            $('.webrock-text-repeater', $field).on('click', function() {
                var name = $field.attr('data-name');
                var input = '<input type="text" class="form-control" name="' + name + '"/>';
                input += '<a href="javascript:void(0);" class="delete-text-repeater"><i class="fa fa-times"></i></a>';
                $('.webrock-text-repeater', $field).before(input);
                $(':text', $field).on('change', function() {
                    self.updateObject();
                })
            })

            // delete text field
            $('body').on('click', '.delete-text-repeater', function() {
                var index = $(this).index() / 2 - 1;
                $(this).remove();
                $(':text', $field).eq(index).remove();
                $(':text', $field).change();
            })



        }
)
