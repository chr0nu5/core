/* =============================================
 * Add Textarea Input
 * 
 * addInput(id, getValue, setValue, initInput, change);
 * ============================================= */
webrock.addInput(
        'textarea',
        function($field) {
            // getValue
            var value = $('textarea', $field).val();
            return value;
        },
        function($field, value) {
            // setValue
            $('textarea', $field).val(value);
        },
        function($field) {
            // initInput
            var self = this;
            $('textarea', $field).on('change', function() {
                self.updateObject();
            })
        }
)
