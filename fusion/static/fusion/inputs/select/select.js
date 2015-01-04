/* =============================================
 * Add Select Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'select',
        function($field) {
            // getValue
            var value = $('select', $field).val();
            return value;
        },
        function($field, value) {
            // setValue
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
