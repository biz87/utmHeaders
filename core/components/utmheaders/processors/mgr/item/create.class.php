<?php

class utmHeadersItemCreateProcessor extends modObjectCreateProcessor
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
        $name = trim($this->getProperty('utmkey'));
        if (empty($name)) {
            $this->modx->error->addField('utmkey', $this->modx->lexicon('utmheaders_item_err_utmkey'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('utmkey', $this->modx->lexicon('utmheaders_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'utmHeadersItemCreateProcessor';