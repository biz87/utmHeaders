utmHeaders.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'utmheaders-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('utmheaders') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('utmheaders_items'),
                layout: 'anchor',
                items: [{
                    html: _('utmheaders_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'utmheaders-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    utmHeaders.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(utmHeaders.panel.Home, MODx.Panel);
Ext.reg('utmheaders-panel-home', utmHeaders.panel.Home);
