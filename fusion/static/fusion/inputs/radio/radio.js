/* =============================================
 * Add Radio Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'radio',
        function($field) {
            // getValue
            var value = $(':checked', $field).val();

            if (typeof value == 'undefined'){
                value = $('[data-checked="1"]', $field).val()
            }
            return value;
        },
        function($field, value) {
            // setValue
            $('[value="' + value + '"]', $field).attr('data-checked', '1').prop('checked', true);
        },
        function($field) {
            // initInput
            var self = this;

            $(':radio', $field).on('click', function() {
                $(':radio', $field).attr('data-checked', '0').prop('checked', false)
                $(this).attr('data-checked', '1').prop('checked', true)
            })

            $(':radio', $field).on('change', function() {
                self.updateObject();
            })
        }
)
