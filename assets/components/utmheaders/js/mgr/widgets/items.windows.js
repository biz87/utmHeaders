utmHeaders.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'utmheaders-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('utmheaders_item_create'),
        width: 550,
        autoHeight: true,
        url: utmHeaders.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    utmHeaders.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(utmHeaders.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('utmheaders_item_utmkey'),
            name: 'utmkey',
            id: config.id + '-utmkey',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('utmheaders_item_header'),
            name: 'header',
            id: config.id + '-header',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('utmheaders_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        },{
            xtype: 'modx-combo-resource',
            fieldLabel: _('utmheaders_item_resource_id'),
            anchor: '99%'
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('utmheaders-item-window-create', utmHeaders.window.CreateItem);


utmHeaders.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'utmheaders-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('utmheaders_item_update'),
        width: 550,
        autoHeight: true,
        url: utmHeaders.config.connector_url,
        action: 'mgr/item/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    utmHeaders.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(utmHeaders.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('utmheaders_item_utmkey'),
            name: 'utmkey',
            id: config.id + '-utmkey',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('utmheaders_item_header'),
            name: 'header',
            id: config.id + '-header',
            anchor: '99%',
            height: 150,
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('utmheaders_item_active'),
            name: 'active',
            id: config.id + '-active',
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('utmheaders-item-window-update', utmHeaders.window.UpdateItem);