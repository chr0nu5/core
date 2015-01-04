/* =============================================
 * Add Margin Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */
webrock.addInput(
        'margin',
        function($field) {
            // getValue
            var value = $(':text', $field).eq(0).val();
            return value;
        },
        function($field, value) {
            // setValue
            $(':text', $field).eq(0).val(value);

            var trbl = value.replace(/px/g, '').split(' ')

            $('.webrock-margin-top', $field).val(trbl[0])
            $('.webrock-margin-right', $field).val(trbl[1])
            $('.webrock-margin-bottom', $field).val(trbl[2])
            $('.webrock-margin-left', $field).val(trbl[3])
        },
        function($field) {
            // initInput
            var self = this;
            $(':text', $field).eq(0).on('change', function() {
                var value = $(':text', $field).eq(0).val();
                var trbl = value.replace(/px/g, '').split(' ')

                $('.webrock-margin-top', $field).val(trbl[0])
                $('.webrock-margin-right', $field).val(trbl[1])
                $('.webrock-margin-bottom', $field).val(trbl[2])
                $('.webrock-margin-left', $field).val(trbl[3])
                self.updateObject();
            })

            $('.webrock-margin-left, .webrock-margin-right, .webrock-margin-top,.webrock-margin-bottom',$field).on('change', function() {
                var value = getMarginInput($field);
                $(':text', $field).eq(0).val(value).change();
            });
        }
)

function getMarginInput($field) {
    var $left = $('.webrock-margin-left', $field);
    var $right = $('.webrock-margin-right', $field);
    var $top = $('.webrock-margin-top', $field);
    var $bottom = $('.webrock-margin-bottom', $field);

    var left = $left.val() != '' ? $left.val() : '0';
    var leftpx = left.indexOf('px') != '-1' || left == 'auto' ? left : left + 'px';

    var right = $right.val() != '' ? $right.val() : '0';
    var rightpx = right.indexOf('px') != '-1' || right == 'auto' ? right : right + 'px';

    var top = $top.val() != '' ? $top.val() : '0';
    var toppx = top.indexOf('px') != '-1' || top == 'auto' ? top : top + 'px';

    var bottom = $bottom.val() != '' ? $bottom.val() : '0';
    var bottompx = bottom.indexOf('px') != '-1' || bottom == 'auto' ? bottom : bottom + 'px';

    var margin = toppx + ' ' + rightpx + ' ' + bottompx + ' ' + leftpx;

    return margin;
}
