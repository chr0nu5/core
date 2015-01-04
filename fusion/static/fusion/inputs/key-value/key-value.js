/* =============================================
 * Add Key Value Input 
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'key-value',
        function($field) {
            // getValue
            var keyvalue = {};
            if ($('.webrock-kv', $field).length && $(':text', $('.webrock-kv', $field).eq(0)).eq(0).val() != '')
                $('.webrock-kv', $field).each(function() {
                    var key = $(':text', $(this)).eq(0).val();
                    var value = $(':text', $(this)).eq(1).val();
                    keyvalue[key] = value;
                });
            else {
                keyvalue = {};
            }

            return JSON.stringify(keyvalue);
        },
        function($field, value) {
            // setValue
            var name = $field.attr('data-name');
            var html = '';
            // create inputs for each key value pair
            value = $.parseJSON(unescapeHtml(value));
            $.each(value, function(key, value) {
                html += '<div class="webrock-kv">';
                html += '<input type="text" class="form-control webrock-kv-key" name="' + name + '" value="' + key + '"/>';
                html += '<input type="text" class="form-control webrock-kv-value" name="' + name + '" value="' + value + '"/>';
                html += '</div>';
            })
            // replace existing fields with new fields
            $('.webrock-kv', $field).remove();
            $('.webrock-key-value', $field).before(html)
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).on('change', function() {
                self.updateObject();
            })

            // add remove button
            $('.webrock-kv', $field).each(function() {
                var removeField = '<a href="javascript:void(0);" class="delete-key-value"><i class="fa fa-times"></i></a>';
                $(this).append(removeField)
            })

            // create new key value inputs
            $('.webrock-key-value', $field).on('click', function() {
                var name = $field.attr('data-name');
                var input = '';
                input += '<div class="webrock-kv">';
                input += '<input type="text" class="form-control webrock-kv-key" name="' + name + '" />';
                input += '<input type="text" class="form-control webrock-kv-value" name="' + name + '" />';
                input += '<a href="javascript:void(0);" class="delete-key-value"><i class="fa fa-times"></i></a>';
                input += '</div>';
                $('.webrock-key-value', $field).before(input);

                $(':text', $field).on('change', function() {
                    self.updateObject();
                })
            })

            // delete key value pair
            $('body').on('click', '.delete-key-value', function() {
                $(this).parent().remove();
                $(this).remove();

                if (!$(':text', $field).length) {
                    var name = $field.attr('data-name');

                    var input = '';
                    input += '<div class="webrock-kv">';
                    input += '<input type="text" class="form-control webrock-kv-key" name="' + name + '" />';
                    input += '<input type="text" class="form-control webrock-kv-value" name="' + name + '" />';
                    input += '<a href="javascript:void(0);" class="delete-key-value"><i class="fa fa-times"></i></a>';
                    input += '</div>';

                    $('.webrock-key-value', $field).before(input);

                    $(':text', $field).on('change', function() {
                        self.updateObject();
                    })
                }

                $(':text', $field).change();
            })



        }
)
