<?php

class utmHeadersOfficeItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'utmHeadersItem';
    public $classKey = 'utmHeadersItem';
    public $languageTopics = ['utmheaders'];
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('utmheaders_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var utmHeadersItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('utmheaders_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'utmHeadersOfficeItemRemoveProcessor';