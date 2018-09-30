<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var utmHeaders $utmHeaders */
$utmHeaders = $modx->getService('utmHeaders', 'utmHeaders', MODX_CORE_PATH . 'components/utmheaders/model/');
if (!$utmHeaders) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'Could not load utmHeaders class!');
    return '';
}

$pdo = $modx->getService('pdoTools');
$tpl = $modx->getOption('tpl', $scriptProperties, 'tpl.utmHeaders.header');
$key_field = $modx->getOption('key', $scriptProperties, 'utm_term');
$data = array();
if(isset($_GET[$key_field])){
    $key = trim( filter_input(INPUT_GET,$key_field,  FILTER_SANITIZE_STRING) );

    $item =  $modx->getObject('utmHeadersItem', array('utmkey' => $key));
    if($item){
        $data = $item->toArray();
    }
}
$output = $pdo->getChunk($tpl, $data);
// By default just return output
return $output;