utmHeaders.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'utmheaders-panel-home',
            renderTo: 'utmheaders-panel-home-div'
        }]
    });
    utmHeaders.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(utmHeaders.page.Home, MODx.Component);
Ext.reg('utmheaders-page-home', utmHeaders.page.Home);