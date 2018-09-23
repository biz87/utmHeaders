<?php

class utmHeadersItemUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'utmHeadersItem';
    public $classKey = 'utmHeadersItem';
    public $languageTopics = ['utmheaders'];
    //public $permission = 'save';


    /**
     * We doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return bool|string
     */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $id = (int)$this->getProperty('id');
        $name = trim($this->getProperty('utmkey'));
        if (empty($id)) {
            return $this->modx->lexicon('utmheaders_item_err_ns');
        }

        if (empty($name)) {
            $this->modx->error->addField('utmkey', $this->modx->lexicon('utmheaders_item_err_utmkey'));
        } elseif ($this->modx->getCount($this->classKey, ['utmkey' => $name, 'id:!=' => $id])) {
            $this->modx->error->addField('utmkey', $this->modx->lexicon('utmheaders_item_err_ae'));
        }

        return parent::beforeSet();
    }
}

return 'utmHeadersItemUpdateProcessor';
