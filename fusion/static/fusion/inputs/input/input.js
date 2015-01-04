/* =============================================
 * Add Text Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        /* =============================================
         * Input Identifier
         * ============================================= */
        'input',
        function($field) {
            /* =============================================
             * Input GetValue
             * 
             * @used for getting input type value
             * ============================================= */
            var value = $('input', $field).val();
            return value;
        },
        function($field, value) {
            /* =============================================
             * Input SetValue
             * 
             * @used for setting input value on object
             *       edit action
             * ============================================= */
            $('input', $field).val(value);
        },
        function($field) {
            /* =============================================
             * Input Init
             * 
             * @used for initializing the input on object          
             *       edit or add actions
             * ============================================= */
            var self = this;
            $('input', $field).on('change', function() {
                self.updateObject();
            })
        }

)
