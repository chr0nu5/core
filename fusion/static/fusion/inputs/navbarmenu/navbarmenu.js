/* =============================================
 * Add Text Input
 * 
 * addInput(id, getValue, setValue, initInput);
 * ============================================= */

function serializeWebRockMenu($menu) {
    var menu = new Array();

    $('> li', $menu).each(function(index) {
        var $li = $(this);
        var text = $li.attr('data-text')
        var link = $li.attr('data-link')
        var active = $li.attr('data-active')

        var submenu = new Array();

        $('> ul > li', $li).each(function(innerindex) {
            var $innerli = $(this);
            var text = $innerli.attr('data-text')
            var link = $innerli.attr('data-link')
            var active = $innerli.attr('data-active')

            submenu[innerindex] = {
                title: text,
                link: link,
                active: active
            }
        })

        menu[index] = {
            title: text,
            link: link,
            active: active,
            submenu: submenu
        }
    })

    return JSON.stringify(menu);
}

webrock.addInput(
        'navbarmenu',
        function($field) {
            // getValue
            var value = $(':text', $field).eq(0).val();
            return value;
        },
        function($field, value) {
            // setValue
            $(':text', $field).eq(0).val(value);


            if (value != '') {
                value = $.parseJSON(value);
                var menu = '';

                $.each(value, function() {
                    var text = this['title'];
                    var link = this['link'];
                    var active = this['active'];
                    var submenu = this['submenu'];

                    var activeClass = active == 'true' ? ' navinput-active' : '';

                    menu += '<li class="webrock-menu-list-item' + activeClass + '" data-text="' + text + '" data-link="' + link + '" data-active="' + active + '">'
                            + text
                            + '<a href="javascript:void(0);" class="pull-right navbar-element-remove"><i class="fa fa-times"></i></a>'
                            + '<ul class="webrock-menu-list">'

                    $.each(submenu, function() {
                        var text = this['title'];
                        var link = this['link'];
                        var active = this['active'];

                        var activeClass = active == 'true' ? ' navinput-active' : '';

                        menu += '<li class="webrock-menu-list-item' + activeClass + '" data-text="' + text + '" data-link="' + link + '" data-active="' + active + '">'
                                + text
                                + '<a href="javascript:void(0);" class="pull-right navbar-element-remove"><i class="fa fa-times"></i></a>'
                                + '</li>'
                    });

                    menu += '</ul>'
                            + '</li>';


                })

                $('.webrock-menu-list', $field).eq(0).append(menu)


                $('.webrock-menu-list', $field).sortable({
                    items: '.webrock-menu-list-item',
                    placeholder: "ui-state-highlight",
                    connectWith: '.webrock-menu-list',
                    start: function(event, ui) {
                        var helper = '<li class="webrock-menu-list-item helper"></li>';

                        $('> .webrock-menu-list', $field).not(ui.item).each(function() {
                            $('> .webrock-menu-list-item > .webrock-menu-list', $(this)).prepend(helper)
                        })
                    },
                    stop: function() {
                        $('.webrock-menu-list .helper', $field).remove();

                        var $1stlevel = $('> .webrock-menu-list > .webrock-menu-list-item', $field)
                        var $2ndlevel = $('> .webrock-menu-list > .webrock-menu-list-item', $1stlevel);

                        $2ndlevel.each(function() {
                            if ($('> .webrock-menu-list', $(this)).contents().length) {
                                $(this).parent().append($('> .webrock-menu-list', $(this)).contents())
                            }
                        })

                        $(':text', $field).eq(0).val(serializeWebRockMenu($('> .webrock-menu-list', $field))).change();
                    }
                })
            }
        },
        function($field) {
            // initInput
            var self = this;

            $('.webrock-page-button', $field).on('click', function() {
                var text = $(':text', $field).eq(1).val();
                var link = $(':text', $field).eq(2).val();
                var active = $(':checkbox', $field).eq(0).is(':checked');

                var activeClass = active ? ' navinput-active' : '';

                var item = '<li class="webrock-menu-list-item' + activeClass + '" data-text="' + text + '" data-link="' + link + '" data-active="' + active + '">'
                        + text
                        + '<a href="javascript:void(0);" class="pull-right navbar-element-remove"><i class="fa fa-times"></i></a>'
                        + '<ul class="webrock-menu-list"></ul>'
                        + '</li>'

                $('.webrock-menu-list', $field).eq(0).append(item)

                if (active)
                    $(':checkbox', $field).eq(0).prop('checked', false)

                $('.webrock-menu-list', $field).sortable({
                    items: '.webrock-menu-list-item',
                    placeholder: "ui-state-highlight",
                    connectWith: '.webrock-menu-list',
                    start: function(event, ui) {
                        var helper = '<li class="webrock-menu-list-item helper"></li>';

                        $('> .webrock-menu-list', $field).not(ui.item).each(function() {
                            $('> .webrock-menu-list-item > .webrock-menu-list', $(this)).prepend(helper)
                        })
                    },
                    stop: function() {
                        $('.webrock-menu-list .helper', $field).remove();

                        var $1stlevel = $('> .webrock-menu-list > .webrock-menu-list-item', $field)
                        var $2ndlevel = $('> .webrock-menu-list > .webrock-menu-list-item', $1stlevel);

                        $2ndlevel.each(function() {
                            if ($('> .webrock-menu-list', $(this)).contents().length) {
                                $(this).parent().append($('> .webrock-menu-list', $(this)).contents())
                            }
                        })

                        $(':text', $field).eq(0).val(serializeWebRockMenu($('> .webrock-menu-list', $field))).change();
                    }
                })

                $(':text', $field).eq(0).val(serializeWebRockMenu($('> .webrock-menu-list', $field))).change();
            })

            $('body').on('click', '.navbar-element-remove', function() {
                var $parent = $(this).closest('.webrock-menu-list-item');
                $parent.remove();
                $(':text', $field).eq(0).val(serializeWebRockMenu($('> .webrock-menu-list', $field))).change();
            })

            $(':text', $field).eq(0).on('change', function() {
                self.updateObject();
            })
        }
)
