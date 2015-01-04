/* =============================================
 * Add WYSIWYG Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
var WRCodeMirror = {};
webrock.addInput(
        /* =============================================
         * Input Identifier
         * ============================================= */
        'code',
        function($field) {
            /* =============================================
             * Input GetValue
             * 
             * @used for getting input type value
             * ============================================= */
            var value;
            var id = $('textarea', $field).attr('id');

            var editor = WRCodeMirror[id];
            
            if (editor)
                value = editor.getValue();
            else
                value = $('textarea', $field).val();
            
            return value;
        },
        function($field, value) {
            /* =============================================
             * Input SetValue
             * 
             * @used for setting input value on object
             *       edit action
             * ============================================= */
            $('textarea', $field).val(value);
        },
        function($field) {
            /* =============================================
             * Input Init
             * 
             * @used for initializing the input on object          
             *       edit or add actions
             * ============================================= */
            $('textarea', $field).attr('id', getRandomID('codemirror'));
            var self = this;
            var id = $('textarea', $field).attr('id');
            var textarea = document.getElementById(id);
            WRCodeMirror[id] = CodeMirror.fromTextArea(textarea, {
                lineNumbers: true,
                mode: "htmlmixed"
            })

            WRCodeMirror[id].on('blur', function() {
                self.updateObject()
            });
        }

)
