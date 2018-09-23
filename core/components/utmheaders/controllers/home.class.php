<?php

/**
 * The home manager controller for utmHeaders.
 *
 */
class utmHeadersHomeManagerController extends modExtraManagerController
{
    /** @var utmHeaders $utmHeaders */
    public $utmHeaders;


    /**
     *
     */
    public function initialize()
    {
        $this->utmHeaders = $this->modx->getService('utmHeaders', 'utmHeaders', MODX_CORE_PATH . 'components/utmheaders/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['utmheaders:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('utmheaders');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->utmHeaders->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/utmheaders.js');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->utmHeaders->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        utmHeaders.config = ' . json_encode($this->utmHeaders->config) . ';
        utmHeaders.config.connector_url = "' . $this->utmHeaders->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "utmheaders-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="utmheaders-panel-home-div"></div>';

        return '';
    }
}