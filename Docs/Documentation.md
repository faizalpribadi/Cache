# Details usage cache :

1. APC
======
```php
<?php
use Mozart\Library\Cache\Cache;
use Mozart\Library\Cache\Driver\OpCache\Apc;
use Mozart\Library\Cache\Event\Status\CacheStatus;
use Mozart\Library\Cache\Compressed\CacheFlags;

$cache = new Cache(new Apc());
$status = new CacheStatus();

$cache->set('my.cache', 'im cache', CacheFlags::CACHE_LIFETIME );
$data = $cache->get('apc.cache');

if ($data) {
    $cache->remove($id);
    echo $status->getDropCache()->getStatus();
}
```

2. Memcache
===========
```php
<?php
/**
 * Default memcache
 */
$memcache = new \Memcache();
$memcache->connect('localhost', 11211);

/**
 * Cache Status
 */
$cacheStatus = new CacheStatus();

/**
 * Cache Memcache Provider
 */
$cache = new Memcache();
$cache->setMemcache($memcache);
$cache->set('memcache.cache', 'i am memcache cache data', CacheFlags::CACHE_LIFETIME);
$cacheData = $cache->get('memcache.cache');

/**
 * If data id key memcache exist
 * flush all
 */
if ($cacheData) {
    $cache->flush();
    echo $cacheStatus->getFlushingCache()->getStatus();
}
```

3. Filesystem Cache
===================
```php
<?php
$cache = new Cache(new FileCache());
$cache->set('filesystem', 'im cache data from filesystem', CacheFlags::CACHE_LIFETIME);
$cacheData = $cache->get('filesystem');

if ($cacheData) {
    $cache->remove('filesystem');
    echo $cacheStatus->getClearCache()->getStatus();
}
```