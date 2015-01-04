/* =============================================
 * Add Checkbox Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'checkbox',
        function($field) {
            // getValue
            var value = new Array();
            $(':checked', $field).each(function() {
                value.push($(this).val());
            })
            return value;
        },
        function($field, value) {
            // setValue
            value = value.split(',');
            $.each(value, function() {
                $('[data-name="' + this + '"]', $field).prop('checked', true);
            })
        },
        function($field) {
            // initInput
            var self = this;
            $(':checkbox', $field).on('change', function() {
                self.updateObject();
            })
        }
)
