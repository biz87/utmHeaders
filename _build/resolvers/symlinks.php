<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/utmHeaders/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/utmheaders')) {
            $cache->deleteTree(
                $dev . 'assets/components/utmheaders/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/utmheaders/', $dev . 'assets/components/utmheaders');
        }
        if (!is_link($dev . 'core/components/utmheaders')) {
            $cache->deleteTree(
                $dev . 'core/components/utmheaders/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/utmheaders/', $dev . 'core/components/utmheaders');
        }
    }
}

return true;