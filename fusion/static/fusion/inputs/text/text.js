/* =============================================
 * Add Text Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'text',
        function($field) {
            // getValue
            var value = $(':text', $field).val();
            return value;
        },
        function($field, value) {
            // setValue
            $(':text', $field).val(value);
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).on('change', function() {
                self.updateObject();
            })
        }
)
