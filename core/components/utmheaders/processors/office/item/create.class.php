<?php

class utmHeadersOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'utmHeadersItem';
    public $classKey = 'utmHeadersItem';
    public $languageTopics = ['utmheaders'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('utmheaders_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('utmheaders_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'utmHeadersOfficeItemCreateProcessor';