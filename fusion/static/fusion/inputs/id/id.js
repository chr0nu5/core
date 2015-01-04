/* =============================================
 * Add ID Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'id',
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

            var prefix = $(':text', $field).attr('data-object-id')

            if ($(':text', $field).val() == '')
                $(':text', $field).val(getRandomID(prefix))

            $(':text', $field).on('change', function() {
                self.updateObject();
            }).change()
        }
)
