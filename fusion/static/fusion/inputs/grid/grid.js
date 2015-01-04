/* =============================================
 * Add Grid Input 
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'grid',
        function($field) {
            // getValue
            var value = $(':text', $field).val();
            return value;
        },
        function($field, value) {
            // setValue
            value = unescapeHtml(value);
            
            $(':text', $field).val(value);

            $('.webrock-row', $field).removeClass('active');
            $('[data-value="' + value + '"]', $field).addClass('active');
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).on('change', function() {
                self.updateObject();
            })

            $('.webrock-row', $field).on('click', function() {
                var value = $(this).attr('data-value');
                
                $('.webrock-row', $field).removeClass('active');
                $(this).addClass('active');

                $(':text', $field).val(value).change();
            });
        }
)
