utmHeaders.combo.Search = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        xtype: 'twintrigger',
        ctCls: 'x-field-search',
        allowBlank: true,
        msgTarget: 'under',
        emptyText: _('search'),
        name: 'query',
        triggerAction: 'all',
        clearBtnCls: 'x-field-search-clear',
        searchBtnCls: 'x-field-search-go',
        onTrigger1Click: this._triggerSearch,
        onTrigger2Click: this._triggerClear,
    });
    utmHeaders.combo.Search.superclass.constructor.call(this, config);
    this.on('render', function () {
        this.getEl().addKeyListener(Ext.EventObject.ENTER, function () {
            this._triggerSearch();
        }, this);
    });
    this.addEvents('clear', 'search');
};
Ext.extend(utmHeaders.combo.Search, Ext.form.TwinTriggerField, {

    initComponent: function () {
        Ext.form.TwinTriggerField.superclass.initComponent.call(this);
        this.triggerConfig = {
            tag: 'span',
            cls: 'x-field-search-btns',
            cn: [
                {tag: 'div', cls: 'x-form-trigger ' + this.searchBtnCls},
                {tag: 'div', cls: 'x-form-trigger ' + this.clearBtnCls}
            ]
        };
    },

    _triggerSearch: function () {
        this.fireEvent('search', this);
    },

    _triggerClear: function () {
        this.fireEvent('clear', this);
    },

});
Ext.reg('utmheaders-combo-search', utmHeaders.combo.Search);
Ext.reg('utmheaders-field-search', utmHeaders.combo.Search);

MODx.combo.Resource = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'resource_id'
        ,hiddenName: 'id'
        ,displayField: 'pagetitle'
        ,valueField: 'id'
        ,fields: ['pagetitle','id']
        ,pageSize: 20
        ,url: MODx.config.connector_url
        ,baseParams: {
            action: 'resource/getlist'
        }
    });
    MODx.combo.Resource.superclass.constructor.call(this,config);
};
Ext.extend(MODx.combo.Resource,MODx.combo.ComboBox);
Ext.reg('modx-combo-resource',MODx.combo.Resource);