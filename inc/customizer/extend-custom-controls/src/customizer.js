(function ($, api) {
    var $window = $(window),
        $body = $('body');

    /**
     * Resize Preview Frame when show / hide Builder.
     */
    var resizePreviewer = function () {
        var $section = $('.control-section.ahfb-header-builder-active');
        var $footer = $('.control-section.ahfb-footer-builder-active');
        if ($body.hasClass('ahfb-header-builder-is-active') || $body.hasClass('ahfb-footer-builder-is-active')) {
            if ($body.hasClass('ahfb-footer-builder-is-active') && 0 < $footer.length && !$footer.hasClass('ahfb-builder-hide')) {
                api.previewer.container.css('bottom', $footer.outerHeight() + 'px');
            } else if ($body.hasClass('ahfb-header-builder-is-active') && 0 < $section.length && !$section.hasClass('ahfb-builder-hide')) {
                api.previewer.container.css({"bottom": $section.outerHeight() + 'px'});
            } else {
                api.previewer.container.css('bottom', '');
            }
        } else {
            api.previewer.container.css('bottom', '');
        }
    }

    /**
     * Init Astra Header & Footer Builder
     */
    var initAstraBuilderPanel = function (panel) {

        let builder = panel.id.includes("-header-") ? 'header' : 'footer';
        var section = api.section('section-' + builder + '-builder');

        if (section) {

            AstCustomizerAPI.registerControlsBySection(section);
            var $section = section.contentContainer,
                section_layout = api.section('section-' + builder + '-builder-layout');
            AstCustomizerAPI.registerControlsBySection(section_layout);

            panel.expanded.bind(function (isExpanded) {

                _.each(section.controls(), function (control) {

                    set_context(control.id);

                    if ('resolved' === control.deferred.embedded.state()) {
                        return;
                    }
                    control.renderContent();
                    control.deferred.embedded.resolve(); // This triggers control.ready().

                    // Fire event after control is initialized.
                    control.container.trigger('init');
                });
                _.each(section_layout.controls(), function (control) {

                    set_context(control.id);

                    if ('resolved' === control.deferred.embedded.state()) {
                        return;
                    }
                    control.renderContent();
                    control.deferred.embedded.resolve(); // This triggers control.ready().

                    // Fire event after control is initialized.
                    control.container.trigger('init');
                });

                if (isExpanded) {
                    $body.addClass('ahfb-' + builder + '-builder-is-active');
                    $section.addClass('ahfb-' + builder + '-builder-active');
                } else {
                    $body.removeClass('ahfb-' + builder + '-builder-is-active');
                    $section.removeClass('ahfb-' + builder + '-builder-active');
                }

                resizePreviewer();
            });
            $section.on('click', '.ahfb-builder-tab-toggle', function (e) {
                e.preventDefault();
                $section.toggleClass('ahfb-builder-hide');
                resizePreviewer();
            });
        }
    };

    const AstCustomizerAPI = {

        addPanel: function (id, data) {

            // Return if panel already exists.
            if (api.panel(id)) {
                return;
            }

            var Constructor = api.panelConstructor[data.type] || api.Panel, options;
            options = _.extend({params: data}, data);
            api.panel.add(new Constructor(id, options));

        },

        addSection: function (id, data) {

            // Return if section already exists.
            if (api.section(id)) {
                if( ! id.startsWith("sidebar-widgets-") ) {
                    return ;
                }
                api.section.remove(id);
            }

            var Constructor = api.sectionConstructor[data.type] || api.Section, options;
            options = _.extend({params: data}, data);
            api.section.add(new Constructor(id, options));

            // This is just to make section visiable.
            // this.AddDummyControl(id);
        },

        addSubControl: function (parent_control_id) {

            let sub_controls = AstraBuilderCustomizerData.js_configs.sub_controls[parent_control_id];

            if (sub_controls) {
                for (let i = 0; i < sub_controls.length; i++) {
                    let config = sub_controls[i];
                    AstCustomizerAPI.addControl(config.id, config);
                }
            }


        },

        addControl: function (id, data) {

            // Return if control already exists.
            if (api.control(id)) {
                return;
            }

            var Constructor = api.controlConstructor[data.type] || api.Control, options;
            options = _.extend({params: data}, data);
            api.control.add(new Constructor(id, options));
            this.addControlContext(data['section'], id);

            if ('ast-settings-group' === data['type']) {
                this.addSubControl(id);
            }
        },

        addControlContext: function (section_id, control_id) {
            highlight_active_component(section_id);
            set_context(control_id);
        },

        AddDummyControl: function (section_id) {

            let data = {section: section_id};
            var Constructor = api.controlConstructor['ast-dummy'];
            let options = _.extend({params: data}, data);
            api.control.add(new Constructor(section_id + "-ast-dummy", options));
        },

        registerControlsBySection: function (section) {

            let controls = AstraBuilderCustomizerData.js_configs.controls[section.id];
            if (controls) {
                for (let i = 0; i < controls.length; i++) {
                    let config = controls[i];
                    this.addControl(config.id, config);
                }
            }
        },
    };

    function set_context(control_id, control_rules = null ) {

        let rules = control_rules ? control_rules : AstraBuilderCustomizerData.contexts[control_id];
        if (rules) {
            var getSetting = function (settingName) {

                switch (settingName) {
                    case 'ast_selected_device':
                        return api.previewedDevice;
                    case 'ast_selected_tab':
                        return api.state('astra-customizer-tab');
                    default:
                        return api(settingName);
                }
            }
            var initContext = function (element) {
                var isDisplayed = function () {

                    var displayed = false,
                        relation = rules['relation'];

                    if ('OR' !== relation) {
                        relation = 'AND';
                        displayed = true;
                    }

                    // Each rule iteration
                    _.each(rules, function (rule, i) {

                        var result = false,
                            setting = getSetting(rule['setting']);

                        if (undefined !== setting) {
                            var operator = rule['operator'],
                                comparedValue = rule['value'],
                                currentValue = setting.get();
                            if (undefined == operator || '=' == operator) {
                                operator = '==';
                            }

                            switch (operator) {
                                case 'in':
                                    result = 0 <= comparedValue.indexOf(currentValue);
                                    break;

                                default:
                                    result = comparedValue == currentValue;
                                    break;
                            }
                        }

                        switch (relation) {
                            case 'OR':
                                displayed = displayed || result;
                                break;

                            default:
                                displayed = displayed && result;
                                break;
                        }
                    });

                    return displayed;
                };
                var setActiveState = function () {
                    element.active.set(isDisplayed());
                };
                _.each(rules, function (rule, i) {

                    var setting = getSetting(rule['setting']);

                    if (undefined !== setting) {
                        setting.bind(setActiveState);
                    }
                });
                element.active.validate = isDisplayed;
                setActiveState();
            };
            api.control(control_id, initContext);
        }
    }

    function highlight_active_component(section_id) {
        var builder_items = $('.ahfb-builder-drop .ahfb-builder-item');
        $.each(builder_items, function (i, val) {
            var component_section = $(val).attr('data-section');
            if (component_section === section_id) {
                $(val).addClass('active-builder-item');
            }
        });
    }



    api.bind('ready', function () {

        wp.customize.controlConstructor['ast-dummy'] = wp.customize.astraControl.extend({
            renderContent: function renderContent() {
            }
        });

        setTimeout(function (){
            if (AstraBuilderCustomizerData && AstraBuilderCustomizerData.js_configs) {

                let panels = AstraBuilderCustomizerData.js_configs.panels;
                let sections = AstraBuilderCustomizerData.js_configs.sections;

                setTimeout(function (){
                    for (let i = 0; i < panels.length; i++) {
                        let config = panels[i];
                        AstCustomizerAPI.addPanel(config.id, config);
                    }
                }, 1);

                setTimeout(function (){
                    for (let i = 0; i < sections.length; i++) {
                        let config = sections[i];
                        AstCustomizerAPI.addSection(config.id, config);
                        AstCustomizerAPI.registerControlsBySection( api.section( config.id ) );
                    }
                }, 2);

                setTimeout(function (){
                    api.panel('panel-header-builder-group', initAstraBuilderPanel)
                    api.panel('panel-footer-builder-group', initAstraBuilderPanel);
                }, 3)

            }
        }, 1);

        api.previewer.bind('ready', function (data) {

            // Process wordpress default control contexts.
            if (AstraBuilderCustomizerData && AstraBuilderCustomizerData.contexts) {
                let default_contexts = AstraBuilderCustomizerData.contexts['wp_defaults'];
                setTimeout(function (){
                    for (const [key, value] of Object.entries(default_contexts)) {
                        set_context( key, value );
                    }
                }, 1);
            }

            api.section.each(function (section) {
                section.expanded.bind(function () {
                    $('.ahfb-builder-drop .ahfb-builder-item').removeClass('active-builder-item');
                    _.each(section.controls(), function (control) {
                        highlight_active_component( section.id );
                        set_context(control.id);
                    });
                });
            });
        });

        api.state.create('astra-customizer-tab');
        api.state('astra-customizer-tab').set('general');

        // Set handler when custom responsive toggle is clicked.
        $('#customize-theme-controls').on('click', '.ahfb-build-tabs-button:not(.ahfb-nav-tabs-button)', function (e) {
            e.preventDefault();
            api.previewedDevice.set($(this).attr('data-device'));
        });

        // Set handler when custom responsive toggle is clicked.
        $('#customize-theme-controls').on('click', '.ahfb-compontent-tabs-button:not(.ahfb-nav-tabs-button)', function (e) {
            e.preventDefault();
            api.state('astra-customizer-tab').set($(this).attr('data-tab'));
        });

        var setCustomTabElementsDisplay = function () {
            var tabState = api.state('astra-customizer-tab').get(),
                $tabs = $('.ahfb-compontent-tabs-button:not(.ahfb-nav-tabs-button)');
            $tabs.removeClass('nav-tab-active').filter('.ahfb-' + tabState + '-tab').addClass('nav-tab-active');
        }
        // Refresh all responsive elements when previewedDevice is changed.
        api.state('astra-customizer-tab').bind(setCustomTabElementsDisplay);

        $('#customize-theme-controls').on('click', 'customize-section-back', function (e) {
            api.state('astra-customizer-tab').set('general');
        });


        $window.on('resize', resizePreviewer);


        /**
         * Trigger on Above header column or layout change.
         */
        api('astra-settings[hba-footer-column]', function (value) {
            value.bind(function (columns) {

                let event = new CustomEvent(
                    'AstraBuilderChangeRowLayout', {
                        'detail': {
                            'columns': columns,
                            'layout': api.value('astra-settings[hba-footer-layout]').get(),
                            'type': 'above'
                        }
                    });
                document.dispatchEvent(event);
            });
        });

        /**
         * Trigger on Primary header column or layout change.
         */
        api('astra-settings[hb-footer-column]', function (value) {
            value.bind(function (columns) {

                let event = new CustomEvent(
                    'AstraBuilderChangeRowLayout', {
                        'detail': {
                            'columns': columns,
                            'layout': api.value('astra-settings[hb-footer-layout]').get(),
                            'type': 'primary'
                        }
                    });
                document.dispatchEvent(event);
            });
        });

        /**
         * Trigger on Below header column or layout change.
         */
        api('astra-settings[hbb-footer-column]', function (value) {
            value.bind(function (columns) {

                let event = new CustomEvent(
                    'AstraBuilderChangeRowLayout', {
                        'detail': {
                            'columns': columns,
                            'layout': api.value('astra-settings[hbb-footer-layout]').get(),
                            'type': 'below'
                        }
                    });
                document.dispatchEvent(event);
            });
        });
    });

})(jQuery, wp.customize);
