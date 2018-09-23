var utmHeaders = function (config) {
    config = config || {};
    utmHeaders.superclass.constructor.call(this, config);
};
Ext.extend(utmHeaders, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('utmheaders', utmHeaders);

utmHeaders = new utmHeaders();