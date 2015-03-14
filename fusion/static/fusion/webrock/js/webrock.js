/* =============================================
 * FusionCORE
 *
 * @file {js} 
 * @role main plugin functionality
 * ============================================= */
function WebRock() {
    /* ===
     * Self Instance
     * 
     * @role enables use of methods inside 
     *       of methods
     * === */
    var self = this;

    /* ===
     * FusionCORE 
     * 
     * @role main framework container
     * === */
    var $webrock = $('.webrock');

    /* ===
     * FusionCORE Sandbox
     * 
     * @role main elements container
     * === */
    var $sandbox = $('.webrock-sandbox');

    /* ===
     * FusionCORE Activities 
     * 
     * @role trigger main functionality
     * === */
    var $activities = $('.webrock-activities');

    /* ===
     * FusionCORE Pages
     * 
     * @role main framework content blocks
     * === */
    var $pages = $('.webrock-page', $webrock);
    var $listPage = $('#webrock-list-page');
    var $addPage = $('#webrock-add-page');
    var $settingsPage = $('#webrock-settings-page');

    /* ===
     * FusionCORE Current Page
     * 
     * @role remember current page for reopening or closing
     * === */
    var currentPage = null;

    /* ===
     * FusionCORE Context Menu
     * 
     * @role enable or disable right click context menu
     * === */
    var enableContextMenu = true;

    /* ===
     * FusionCORE confirmDelete
     * 
     * @role determines whether the delete action 
     *       requires a confirmation from the user
     * === */
    var confirmDelete = true;

    /* ===
     * FusionCORE Activities 
     * 
     * @role trigger main functionality
     * === */
    var saveData = {};

    /* ===
     * FusionCORE Initial List Filter
     * 
     * @role disable unnecessary items in the add list
     * === */
    var initListFilterArray = new Array();
    var initListFilter = '';

    /* ===
     * FusionCORE Search Items
     * 
     * @role search for items inside the 
     *       WebRock object list
     * === */
    var $searchItems = $('li', $listPage);

    /* ===
     * DebugMode
     * 
     * @role enables console output for
     *       all of the WebRock methods
     * === */
    var debugMode = true;

    this.enableConsole = function () {
        this.debugMode = true;
    }
    this.disableConsole = function () {
        this.debugMode = false;
    }

    /* ===
     * FusionCORE getValue
     * 
     * @role array of getValue functions
     * === */
    var webrockScript = {};

    /* ===
     * FusionCORE getValue
     * 
     * @role array of getValue functions
     * === */
    var getValue = {};

    /* ===
     * FusionCORE setValue
     * 
     * @role array of setValue functions
     * === */
    var setValue = {};

    /* ===
     * FusionCORE initInput
     * 
     * @role array of initInput functions
     * === */
    var initInput = {};

    /* ===
     * FusionCORE objectInit
     * 
     * @role array of init functions
     * === */
    var objectInit = {};

    /* ===
     * FusionCORE objectRun
     * 
     * @role array of run functions
     * === */
    var objectRun = {};

    /* ===
     * FusionCORE beforeEdit
     * 
     * @role save initial object state
     *       for recovery on cancel
     * === */
    var beforeEdit = null;

    /* ===
     * FusionCORE scssVariables
     * 
     * @role store scss variables used for 
     *       the theme editor
     * === */
    var scssVariables = {};

    /* ===
     * FusionCORE Target
     * 
     * @role designates target object
     *       add: inserts into target content
     *       edit: replaces target entirely
     * === */
    var $target = $('.webrock-sandbox');

    /* ===
     * Fullscreen
     * 
     * @method
     * @role toggle Fullscreen
     * === */
    this.fullscreen = function () {
        var enable = !($webrock.hasClass('webrock-fullscreen'));
        if (enable == true) {
            $webrock.addClass('webrock-fullscreen');
        }
        else {
            $webrock.removeClass('webrock-fullscreen');
        }

        if (debugMode == true)
            console.log('Fullscreen', enable);
    }

    /* ===
     * Show List
     * 
     * @method
     * @role show and filter list page
     * === */
    this.showList = function (filter, exclude) {

        $('[data-shortcode]', $listPage).show(0);

        if (filter != null && filter != '*') {
            filter = filter.split(',');

            if (filter.length == 1) {
                self.createObject(filter[0], false);
                return;
            }

            if (exclude == 'true' || exclude == '1') {
                // Show all except filter
                $.each(filter, function () {
                    $('[data-shortcode="' + $.trim(this) + '"]', $listPage).hide(0);
                })
            } else {
                // Show only filter
                $('[data-shortcode]', $listPage).hide(0);
                $.each(filter, function () {
                    $('[data-shortcode="' + $.trim(this) + '"]', $listPage).show(0);
                })
            }
        }

        self.showPage($listPage);
        $searchItems = $('li:visible', $listPage);

        if (debugMode)
            console.log('showList', filter, exclude)
    }


    this.addListFilter = function (item) {
        initListFilterArray.push(item);
        initListFilter = initListFilterArray.join(',')
    }

    /* ===
     * Show Page
     * 
     * @method
     * @role show page and hide activities
     * === */
    this.showPage = function ($page) {
        $activities.removeClass('webrock-visible');
        $webrock.addClass('webrock-visible');
        $pages.removeClass('webrock-page-visible');
        $page.addClass('webrock-page-visible');
        if (debugMode == true)
            console.log('Show Page', $page.attr('id'));
    }

    /* ===
     * Show Edit Page
     * 
     * @method
     * @role load and show add page
     * === */
    this.showEditPage = function (shortcode) {
        var atts = $target.attr('data-atts');
        var $page = $('[data-shortcode-page="' + shortcode + '"] .webrock-page-content', $webrock);

        $('.webrock-page-content', $addPage).html($page.html());
        beforeEdit = atts;

        if ($('.webrock-field', $page).length == 0) {
            self.hidePages();
            currentPage = null;
            return;
        }

        self.setAtts($addPage, atts);
        self.initInputs($addPage);
        self.showPage($addPage);

        // Filter Attributes by Select
        $('.webrock-input-categories').on('change', function () {
            var value = $(this).val();
            var $fields = $('[data-category]', $addPage);
            if (value == '*')
                $fields.show();
            else
                $fields.show().each(function () {
                    if ($(this).attr('data-category') != value)
                        $(this).hide();
                })
        });
    }


    /* ===
     * Hide Pages
     * 
     * @method
     * @role hide page and show activities
     * === */
    this.hidePages = function () {
        $activities.addClass('webrock-visible')
        $webrock.removeClass('webrock-visible')
        $pages.removeClass('webrock-page-visible');
        if (debugMode == true)
            console.log('All Pages Hidden');
    }

    /* ===
     * Add Object
     * 
     * @method
     * @role add a new object to the page
     * === */
    this.createObject = function (shortcode, edit) {
        if (typeof shortcode == 'undefined')
            return null;

        var atts = null, content = null, filter = null, filterExclude = null;

        var $shortcode_page = $('[data-shortcode-page="' + shortcode + '"]', $webrock);

        // Get Atts
        if (edit == true)
            atts = self.getAtts($addPage);
        else {
            atts = $.parseJSON($shortcode_page.attr('data-atts'));
        }

        filter = $shortcode_page.attr('data-filter');
        filterExclude = $shortcode_page.attr('data-filter-exclude')


        // Get Content
        if (edit == true)
            content = $target.find('.webrock-content').html();
        content = content == '' ? null : content;

        // AJAX Data
        var data = {
            shortcode: shortcode,
            atts: atts,
            content: content,
            ajax: true
        }

        if (debugMode == true)
            console.log('createObject', data);
        // Add Object AJAX Call
        // 
        // get result based on shortcode, atts and content
        $.ajax({
            url: "/fusion/widget_"+shortcode.replace('-','_')+"/get_widget/",
            type: "POST",
            data: data,
            cache: false,
            success: function (result) {
                var attsdata = JSON.stringify(atts);
                var $result = $(result).not('style').not('script').addClass('webrock-object');

                if (!$result.attr('data-atts'))
                    $result.attr('data-atts', attsdata);
                if (!$result.attr('data-shortcode'))
                    $result.attr('data-shortcode', shortcode)

                $result.attr('data-filter', filter)
                $result.attr('data-filter-exclude', filterExclude)

                var resultID = $result.attr('id');
                // handle <style>
                $('[data-target-object="' + resultID + '"]').remove()
                var $style = $(result).filter('style');
                if ($style.length > 0 && typeof resultID != 'undefined' && resultID != '') {
                    $style.attr('data-target-object', resultID).appendTo('head');
                }

                // handle <script>
                var $script = $(result).filter('script');
                if ($script.length > 0 && typeof resultID != 'undefined' && resultID != '') {
                    webrockScript[resultID] = $script.text();
                }

                // edit true: Replace $target
                // edit false: Add to $target and Show Edit Page
                if (edit == true) {
                    $target.replaceWith($result);
                    $target = $result;
                    if (debugMode == true)
                        console.log('Updated:', shortcode, result);
                } else {
                    $target.find('.webrock-content').eq(0).append($result);
                    $target = $result;
                    self.showEditPage(shortcode);
                    if (debugMode == true)
                        console.log('Added:', shortcode, result);

                }

                $('> .webrock-content', $sandbox).sortable({
                    cursor: 'drag',
                    items: '[data-shortcode]'
                })
                $.each(objectInit, function (key, value) {
                    objectInit[key].call(self);
                })

                self.bindObjectActions();
            }
        })
    }

    /* ===
     * Remove Object
     * 
     * @method
     * @role remove an object from the page
     * === */
    this.removeObject = function ($object) {
        var id = $object.attr('id');
        var shortcode = $object.attr('data-shortcode')

        if ($('[data-shortcode]', $object).length > 0)
            $('[data-shortcode]', $object).each(function () {
                self.removeObject($(this));
            })

        $object.remove();

        if (typeof id != 'undefined' && id != '') {
            $('[data-target-object="' + id + '"]').remove();
            delete webrockScript[id];
        }

        if (debugMode == true)
            console.log('Removed ' + shortcode);
    }

    /* ===
     * update Object
     * 
     * @method
     * @role update the object on input change
     * === */
    this.updateObject = function () {
        var shortcode = $target.attr('data-shortcode');
        self.createObject(shortcode, true);
    }

    /* ===
     * showObjectActions
     * 
     * @method
     * @role show main object actions
     * === */
    this.showObjectActions = function ($object) {
        var shortcode = $object.attr('data-shortcode');
        var content = $('.webrock-content', $object).length
        var page = $('[data-shortcode-page="' + shortcode + '"]');
        var title = $('[data-shortcode="' + shortcode + '"] .webrock-title-text', $listPage).html();
        var html = '<div class="webrock-object-actions">'
            + '<div class="webrock-object-actions-title">' + title + '</div>'
            + '<div class="webrock-object-actions-list">';
        if (content)
            html += '<a class="webrock-object-actions-item webrock-object-actions-add" href="javascript:void(0);">'
            + '<i class="fa fa-plus"></i>'
            + '</a>';
        if ($('.webrock-field', page).length > 0)
            html += '<a class="webrock-object-actions-item webrock-object-actions-edit" href="javascript:void(0);">'
            + '<i class="fa fa-pencil"></i>'
            + '</a>';
        html += '<a class="webrock-object-actions-item webrock-object-actions-remove" href="javascript:void(0);">'
        + '<i class="fa fa-times"></i>'
        + '</a>'
        + '<a class="webrock-object-actions-item webrock-object-actions-duplicate" href="javascript:void(0);">'
        + '<i class="fa fa-copy"></i>'
        + '</a>'
        + '</div>'
        + '</div>';

        if (!$('> .webrock-object-actions', $object).length)
            $object.prepend(html);
    }

    /* ===
     * hideObjectActions
     * 
     * @method
     * @role hide main object actions
     * === */
    this.hideObjectActions = function ($object) {
        $('> .webrock-object-actions', $object).remove();
    }

    /* ===
     * bindObjectActions
     * 
     * @method
     * @role bind main object actions
     * === */
    this.bindObjectActions = function () {
        $('[data-shortcode]', $sandbox).not('[data-shortcode="grid"]').on('mouseenter', function () {
            var $object = $(this);
            self.showObjectActions($object);
        }).on('mouseleave', function () {
            var $object = $(this);
            self.hideObjectActions($object);
        })
    }

    /* ===
     * Get Atts
     * 
     * @method
     * @role get attributes from input fields
     * === */
    this.getAtts = function ($page) {
        var atts = {};
        var $fields = $('.webrock-field', $page);
        $fields.each(function () {
            var $field = $(this);
            var type = $field.attr('data-type');
            var name = $field.attr('data-name');
            var required = $field.attr('data-required');
            var value = escapeHtml(getValue[type].call(self, $field));

            if (typeof value != 'undefined') {
                atts[name] = value;
            }
        })

        $.map(atts, function (value, index) {
            return value;
        });
        return atts;
    }

    /* ===
     * Set Atts
     * 
     * @method
     * @role set attributes to input fields
     * === */
    this.setAtts = function ($page, atts) {
        atts = $.parseJSON(atts);
        $.each(atts, function (key, value) {
            var $field = $('[data-name="' + key + '"]', $page);

            var type = $field.attr('data-type');
            if (setValue[type])
                setValue[type].call(self, $field, unescapeHtml(value));
        })
    }


    /* ===
     * Initialize Page Inputs
     * 
     * @method
     * @role get each input and apply the init function
     * === */
    this.initInputs = function ($page) {
        var $fields = $('.webrock-field', $page);
        $fields.each(function () {
            var $field = $(this);
            var type = $field.attr('data-type');
            initInput[type].call(self, $field);
        });
    }


    /* ===
     * Add Input
     * 
     * @method
     * @role adds input specific functions inside
     *       functions array of WebRock
     * === */
    this.addInput = function (id, get, set, init) {
        getValue[id] = get;
        setValue[id] = set;
        initInput[id] = init;
    }

    /* ===
     * Add Object
     * 
     * @method
     * @role adds input specific functions inside
     *       functions array of WebRock
     * === */
    this.addObject = function (id, init, run) {
        objectInit[id] = init;
        objectRun[id] = run;
    }


    /* ===
     * Preview Mode
     * 
     * @method
     * @role render final page version 
     *       inside an iframe
     * === */
    var previewActive = false;
    this.previewMode = function () {
        previewActive = !previewActive;
        if (previewActive == true) {
            var $content = $('html').clone();
            var $content = self.publishContent($content)
            var $iframe = $('<iframe>', {
                id: 'webrockPreview',
                frameborder: 0
            });
            $iframe.prependTo('body')

            self.hidePages();

            var doc = document.getElementById('webrockPreview').contentWindow.document;
            doc.open();
            doc.write($content.prop('outerHTML'));
            doc.close();
            $(window).resize(function () {
                $('#webrockPreview').height($(this).height())
            }).trigger('resize')

            $('body').addClass('no-overflow');

            $('.webrock-sandbox').hide();

            $('.webrock-activity-preview-trigger.active').removeClass('active');
            $('.webrock-activity-preview-desktop').addClass('active');

            $('.webrock-activity').not('.webrock-activity-preview').not('.webrock-activity-preview-trigger').hide();

            $('.webrock-activity-preview i').removeClass('fa-eye').addClass('fa-eye-slash')

            $('.webrock-activity-preview-trigger').removeClass('hidden');
        } else {
            $('#webrockPreview').remove();
            $('body').removeClass('no-overflow');
            $('.webrock-sandbox').show();
            $('.webrock-activity').show();

            $('.webrock-activity-preview i').removeClass('fa-eye-slash').addClass('fa-eye')

            $('.webrock-activity-preview-trigger').addClass('hidden');
        }
    }

    /* ===
     * Context Menu
     * 
     * @method
     * @role enable context menu and bind actions
     * === */
    this.contextMenu = function () {
        var clipboard = '';
        $.contextMenu2({
            selector: '.webrock-object',
            callback: function (key, options) {

                switch (key) {
                    case 'add' :
                    {
                        $target = $(this);
                        self.showList();
                    }
                        break;
                    case 'edit' :
                    {
                        $target = $(this);
                        self.showEditPage($target.attr('data-shortcode'));
                    }
                        break;
                    case 'cut' :
                    {
                        $(this).removeClass('context-menu-active');
                        clipboard = $(this).prop("outerHTML");
                        $(this).remove();
                    }
                        break;
                    case 'copy' :
                    {
                        $(this).removeClass('context-menu-active');
                        clipboard = $(this).prop("outerHTML");
                    }
                        break;
                    case 'paste' :
                    {
                        var $this = $(this);
                        if ($('.webrock-content', $this).length > 0) {
                            $('.webrock-content', $this).eq(0).append(clipboard);
                        } else {
                            $this.closest('.webrock-content').append(clipboard);
                        }

                        $.each(objectInit, function (key, value) {
                            objectInit[key].call(self);
                        })
                        self.bindObjectActions();
                    }
                        break;
                    case 'moveup' :
                    {
                        $(this).removeClass('context-menu-active');
                        var $prev = $(this).prev();
                        var prev = $prev.prop('outerHTML');

                        if (typeof prev != 'undefined') {
                            $prev.replaceWith($(this));
                            $(this).after(prev);

                            $.each(objectInit, function (key, value) {
                                objectInit[key].call(self);
                            })
                            self.bindObjectActions();
                        }
                    }
                        break;
                    case 'movedown' :
                    {
                        $(this).removeClass('context-menu-active');
                        var $next = $(this).next();
                        var next = $next.prop('outerHTML');

                        if (typeof next != 'undefined') {
                            $next.replaceWith($(this));
                            $(this).after(next);

                            $.each(objectInit, function (key, value) {
                                objectInit[key].call(self);
                            })
                            self.bindObjectActions();
                        }
                    }
                        break;

                    case 'delete' :
                    {
                        var shortcode = $(this).attr('data-shortcode')
                        if (confirm('Are you sure you want to delete the ' + shortcode + ' object and its contents?'))
                            $(this).remove();
                    }
                        break;
                }

            },
            items: {
                "add": {name: "Add", icon: "add"},
                "edit": {name: "Edit", icon: "edit"},
                "cut": {name: "Cut", icon: "cut"},
                "copy": {name: "Copy", icon: "copy"},
                "paste": {name: "Paste", icon: "paste"},
                "sep1": "---------",
                "moveup": {name: "Move Up", icon: "moveup"},
                "movedown": {name: "Move Down", icon: "movedown"},
                "sep2": "---------",
                "delete": {name: "Delete", icon: "delete"}
            }
        });

    }


    /* ===
     * Publish Content
     * 
     * @method
     * @role get content with all the webrock dependencies
     *       removed and processed
     * === */
    this.publishContent = function ($content) {
        var content = $content.clone();
        // Remove admin specific styles and scripts
        $('.admin_style, .webrock_admin_style, .admin_script, .webrock_admin_script', content).remove();

        // Remove Activities
        $('.webrock-activities', content).remove();
        // Remove Webrock Framework
        $('.webrock', content).remove();
        // Plugin Residues
        $('.sp-container', content).remove();
        $('.context-menu-list', content).remove();
        $('.mce-widget', content).remove();
        $('.mce-container', content).remove();

        // Remove Image Browser
        $('.webrock-image-browser-background', content).remove();
        // Replace Containers with Contents
        $('.webrock-content', content).each(function () {
            $(this).replaceWith($(this).contents())
        });

        // Loop through shortcodes and sanitize page
        var shortcodes = new Array();
        $('[data-shortcode]', $($('.webrock-sandbox'), content)).each(function () {
            var shortcode = $(this).attr('data-shortcode');
            if (shortcodes.indexOf(shortcode) == -1)
                shortcodes.push(shortcode);
        });

        var objectRun_publish = cloneObject(objectRun);

        $.each(objectRun_publish, function (key, value) {
            if (shortcodes.indexOf(key) == -1)
                delete objectRun_publish[key];
        })

        $('[data-shortcode-target]', content).each(function () {
            var shortcode = $(this).attr('data-shortcode-target');
            if (shortcodes.indexOf(shortcode) == -1)
                $(this).remove();
        });

        // Remove additional attributes
        $('.webrock-object', content).removeClass('webrock-object').removeClass('ui-sortable').removeAttr('data-shortcode').removeAttr('data-atts').removeAttr('data-filter').removeAttr('data-filter-exclude')

        // Remove stray object actions
        $('.webrock-object-actions', content).remove();

        // Make scripts active
        $('script[data-src]', content).each(function () {
            $(this).attr('src', $(this).attr('data-src'))
        })

        // Create Object Specific Script
        var scripts = 'jQuery(document).ready(function(){\n';
        $.each(webrockScript, function (key, value) {
            value = value.toString();
            scripts += $.trim(value) + '\n';
        });
        // Create Object Run Script
        var runscripts = '';
        $.each(objectRun_publish, function (key, value) {
            value = value.toString();
            runscripts += $.trim(value.substring(value.indexOf("{") + 1, value.lastIndexOf("}")) + '\n');
        })
        runscripts += '});';
        // Append Object Run Script
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.id = 'themeScript';
        var $script = $(script).html(scripts + '\n' + runscripts);

        $('body', content).append($script)

        return content;
    }


    /* ===
     * Initialize Framework
     * 
     * @method
     * @role initialize the framework
     *       bind all functionalities
     * === */
    this.init = function () {

        /* ===
         * Initialize Scrolling
         * === */
        $pages.each(function () {
            $(this).nanoScroller({
                contentClass: 'webrock-page-content'
            });
        });
        if (debugMode == true)
            console.log('Scroller Initialized');

        /* ===
         * Context Menu
         * === */
        if (enableContextMenu == true)
            self.contextMenu();


        /* ===
         * Set initial attributes
         * === */
        $(window).load(function () {
            $('[data-shortcode-page]').each(function () {
                var atts = self.getAtts($(this));
                $(this).attr('data-atts', JSON.stringify(atts))
            })
        })


        /* ===
         * Bind Fullscreen Toggle
         * === */
        $('.webrock-toggle-fullscreen', $webrock).click(function () {
            self.fullscreen();
        })

        /* ===
         * Bind Activities Add
         * === */
        $('.webrock-activity-add-object').click(function () {
            if (currentPage != 'add-object') {
                $target = $('.webrock-sandbox');
                self.showList(initListFilter, true);
                currentPage = 'add-object';
            } else {
                self.hidePages();
                currentPage = null;
            }
        })

        /* ===
         * Bind Activities Preview
         * === */
        $('.webrock-activity-preview').click(function () {
            self.previewMode();
        });

        /* ===
         * Bind Activities Preview Mode
         * === */
        $('.webrock-activity-preview-trigger').click(function () {
            var $mode = $(this);
            var sandboxClass = 'sandbox-fullwidth';

            $('.webrock-activity-preview-trigger.active').removeClass('active');
            $(this).addClass('active');

            if ($mode.hasClass('webrock-activity-preview-desktop'))
                sandboxClass = 'sandbox-fullwidth';

            if ($mode.hasClass('webrock-activity-preview-laptop'))
                sandboxClass = 'sandbox-laptop';

            if ($mode.hasClass('webrock-activity-preview-tablet'))
                sandboxClass = 'sandbox-tablet';

            if ($mode.hasClass('webrock-activity-preview-mobile'))
                sandboxClass = 'sandbox-mobile';

            $('#webrockPreview').removeClass('sandbox-fullwidth sandbox-laptop sandbox-tablet sandbox-mobile');
            $('#webrockPreview').addClass(sandboxClass);
        })


        /* ===
         * Hide Pages on Blur
         * === */
        $sandbox.on('click', function (event) {
            if ($webrock.hasClass('webrock-visible')) {
                self.hidePages();
                currentPage = null;
            }
        })


        /* ===
         * Bind Cancel
         * === */
        $('.webrock-cancel').click(function () {
            self.hidePages();
        })
        $(document).keyup(function (e) {
            if (e.keyCode === 27)
                self.hidePages();
        });
        /* ===
         * Bind Search
         * === */
        $(".webrock-list-search").on("keyup change paste delete", function () {
            var val = $(this).val().toLowerCase();
            var $items = $searchItems;
            if (val == '') {
                $items.show(0);
            } else {
                $items.hide(0);
                $items.each(function () {
                    var item = $(this).attr('data-search-keywords').split(',');
                    for (var i = 0; i < item.length; i++) {
                        if ($.trim(item[i].toLowerCase()).indexOf(val) >= 0) {
                            $(this).show(0);
                        }
                    }
                });
            }
        });
        /* ===
         * Bind Add Object
         * === */
        $('[data-shortcode]', $listPage).click(function () {
            var shortcode = $(this).attr('data-shortcode');
            self.createObject(shortcode, false);
        });
        /* ===
         * Save Changes
         * === */
        $('.webrock-saveEdit').click(function () {
            var shortcode = $target.attr('data-shortcode');
            self.hidePages();

            currentPage = null

            if ($webrock.hasClass('webrock-fullscreen'))
                self.fullscreen();
            if (shortcode == 'grid') {
                $('.grid').replaceWith($('.grid').contents())
            }
        });
        /* ===
         * Undo Changes
         * === */
        $('.webrock-undoEdit').click(function () {
            var shortcode = $target.attr('data-shortcode');
            self.setAtts($addPage, beforeEdit);
            self.createObject(shortcode, true);
            self.hidePages();

            currentPage = null

            if ($webrock.hasClass('webrock-fullscreen'))
                self.fullscreen();
            if (shortcode == 'grid') {
                $('.grid').replaceWith($('.grid').contents())
            }
        });
        /* ===
         * Bind Object Add Action
         * === */
        $('body').on('click', '.webrock-object-actions-add', function () {
            var $parent = $(this).closest('[data-shortcode]');
            var filter = $parent.attr('data-filter');
            var exclude = $parent.attr('data-filter-exclude');
            $target = $parent;

            if (filter == '' || filter == '*' || typeof filter == 'undefined') {
                filter = initListFilter;
                exclude = true;
            }

            self.showList(filter, exclude);
        })

        /* ===
         * Bind Object Edit Action
         * === */
        $('body').on('click', '.webrock-object-actions-edit', function () {
            var $parent = $(this).closest('[data-shortcode]');
            var shortcode = $parent.attr('data-shortcode');
            $target = $parent;
            self.showEditPage(shortcode);
        })

        /* ===
         * Bind Object Remove Action
         * === */
        $('body').on('click', '.webrock-object-actions-remove', function () {
            var $parent = $(this).closest('[data-shortcode]');
            if (confirmDelete && confirm('Are you sure you want to delete the ' + $parent.attr('data-shortcode') + ' object and all of its contents?'))
                self.removeObject($parent)
        })

        /* ===
         * Bind Object Duplicate Action
         * === */
        $('body').on('click', '.webrock-object-actions-duplicate', function () {
            var $parent = $(this).closest('[data-shortcode]');
            $parent.after($parent.clone(true));
        })

        /* ===
         * Init HTML5 Framework version
         * === */
        self.HTML5init();

        /* ===
         * Show / Hide Object Actions
         * === */
        self.bindObjectActions();
        if (debugMode == true)
            console.log('WebRock Succesfully Initialized');
    }


    /* ===
     * savePage
     * 
     * @method
     * @role save a WebRock Template File (JSON) containing all the
     *       current page details 
     * === */
    self.savePage = function () {
        // Page Content
        var content = $('> .webrock-content', $sandbox).html();
        var scriptContent = '';
        $.each(objectRun, function (key, value) {
            value = value.toString();
            scriptContent += value.substring(value.indexOf("{") + 1, value.lastIndexOf("}")) + '\n';
        })

        var runscript = scriptContent;
        // Object Styles and Scripts
        var styles = '';
        $('style[data-target-object]').each(function () {
            styles += $(this).prop('outerHTML') + '\n';
        });


        var $published = self.publishContent($('html').clone())

        var script = JSON.stringify(webrockScript);
        var style = styles;
        var data = {
            page_id: page_id,
            page_content: content,
            page_style: style,
            page_script: script,
            page_runscript: runscript
        }

        data['published_content'] = '<!DOCTYPE html> ' + $published.prop("outerHTML");

        $.ajax({
            type: 'POST',
            url: '/fusion/builder/save/',
            data: data,
            beforeSend: function () {
                $('.webrock-activity-save i').removeClass('fa-save');
                $('.webrock-activity-save i').addClass('fa-spinner fa-spin');
            },
            success: function (data) {
                console.log(data)

                if (data == 'Page saved') {
                    $('.webrock-activity-save i').removeClass('fa-spinner fa-spin');
                    $('.webrock-activity-save i').addClass('fa-check');
                    $('.webrock-activity-save p').text('Page Saved')

                    setTimeout(function () {
                        $('.webrock-activity-save i').removeClass('fa-check');
                        $('.webrock-activity-save i').addClass('fa-save');
                        $('.webrock-activity-save p').text('Save Page')
                    }, 1500)
                } else {
                    $('.webrock-activity-save i').removeClass('fa-spinner fa-spin');
                    $('.webrock-activity-save i').addClass('fa-times');
                    $('.webrock-activity-save p').text('Save Failed')

                    setTimeout(function () {
                        $('.webrock-activity-save i').removeClass('fa-times');
                        $('.webrock-activity-save i').addClass('fa-save');
                        $('.webrock-activity-save p').text('Save Page')
                    }, 1500)
                }

            }
        });
    }


    /* ===
     * HTML5 Init
     * 
     * @method
     * @role initialize html5 
     *       specific functionalities
     * === */
    this.HTML5init = function () {
        /* ===
         * Init Objects
         * === */
        $('> .webrock-content', $sandbox).sortable({
            cursor: 'drag',
            items: '[data-shortcode]'
        })
        $.each(objectInit, function (key, value) {
            objectInit[key].call(self);
        })

        var scriptsJSON = $.trim($('.webrock-load-scripts').text());
        if (scriptsJSON != '') {
            scriptsJSON = $.parseJSON(scriptsJSON);
            $.each(scriptsJSON, function (key, value) {
                webrockScript[key] = value;
            })
        }
        $('.webrock-load-scripts').remove();

        /* ===
         * Bind Activities Save
         * === */
        $('.webrock-activity-save').click(function () {
            self.savePage(true);
        })

    }

}


var webrock = new WebRock();



