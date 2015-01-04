/* =============================================
 * Add ColorPicker Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
    /* =============================================
     * Input Identifier
     * ============================================= */
    'colorpicker',
    function ($field) {
        /* =============================================
         * Input GetValue
         *
         * @used for getting input type value
         * ============================================= */
        var value = $('.webrock-colorpicker', $field).spectrum("get").toString();
        if (value == '[object Object]')
            value = $('.webrock-colorpicker', $field).val();

        return value;
    },
    function ($field, value) {
        /* =============================================
         * Input SetValue
         *
         * @used for setting input value on object
         *       edit action
         * ============================================= */
        $('.webrock-colorpicker', $field).val(value);
        $('.webrock-colorpicker', $field).spectrum('set', value);
    },
    function ($field) {
        /* =============================================
         * Input Init
         *
         * @used for initializing the input on object
         *       edit or add actions
         * ============================================= */
        var self = this;

        $('.webrock-colorpicker', $field).spectrum({
            showInitial: true,
            showPalette: true,
            showInput: true,
            clickoutFiresChange: true,
            cancelText: "Reset",
            chooseText: "Choose",
            preferredFormat: "hex",
            palette: [
                ['#1abc9c', '#2ecc71', '#3498db', '#9b59b6'],
                ['#16a085', '#27ae60', '#2980b9', '#8e44ad'],
                ['#34495e', '#f1c40f', '#e67e22', '#e74c3c'],
                ['#2c3e50', '#f39c12', '#d35400', '#c0392b'],
                ['#ecf0f1', '#95a5a6', '#ffffff', '#90360a'],
                ['#bdc3c7', '#897f79', '#000000', '#29282f']
            ]
        });

        $('.webrock-colorpicker', $field).on('change', function () {
            self.updateObject();
        })

    }
)
