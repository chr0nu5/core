/* =============================================
 * Add Select Multiple Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'select-multiple',
        function($field) {
            // getValue
            var value = $('select', $field).val();
            return value;
        },
        function($field, value) {
            // setValue
            value = value.split(',');
            $('select', $field).val(value);

        },
        function($field) {
            // initInput
            var self = this;
            $('select', $field).on('change', function() {
                self.updateObject();
            })
        }
)
