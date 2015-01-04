/* =============================================
 * Add Padding Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'padding',
        function($field) {
            // getValue
            var value = $(':text', $field).eq(0).val();
            return value;
        },
        function($field, value) {
            // setValue
            $(':text', $field).eq(0).val(value);

            var trbl = value.replace(/px/g, '').split(' ')

            $('.webrock-padding-top', $field).val(trbl[0])
            $('.webrock-padding-right', $field).val(trbl[1])
            $('.webrock-padding-bottom', $field).val(trbl[2])
            $('.webrock-padding-left', $field).val(trbl[3])
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).eq(0).on('change', function() {
                var value = $(':text', $field).eq(0).val();
                var trbl = value.replace(/px/g, '').split(' ')

                $('.webrock-padding-top', $field).val(trbl[0])
                $('.webrock-padding-right', $field).val(trbl[1])
                $('.webrock-padding-bottom', $field).val(trbl[2])
                $('.webrock-padding-left', $field).val(trbl[3])
                self.updateObject();
            })

            $('.webrock-padding-left, .webrock-padding-right, .webrock-padding-top,.webrock-padding-bottom').on('change', function() {
                var value = getPaddingInput($field);
                $(':text', $field).eq(0).val(value).change();
            });
        }
)

function getPaddingInput($field) {
    var $left = $('.webrock-padding-left', $field);
    var $right = $('.webrock-padding-right', $field);
    var $top = $('.webrock-padding-top', $field);
    var $bottom = $('.webrock-padding-bottom', $field);

    var left = $left.val() != '' ? $left.val() : '0';
    var leftpx = left.indexOf('px') != '-1' ? left : left + 'px';

    var right = $right.val() != '' ? $right.val() : '0';
    var rightpx = right.indexOf('px') != '-1' ? right : right + 'px';

    var top = $top.val() != '' ? $top.val() : '0';
    var toppx = top.indexOf('px') != '-1' ? top : top + 'px';

    var bottom = $bottom.val() != '' ? $bottom.val() : '0';
    var bottompx = bottom.indexOf('px') != '-1' ? bottom : bottom + 'px';

    var padding = toppx + ' ' + rightpx + ' ' + bottompx + ' ' + leftpx;

    return padding;
}
