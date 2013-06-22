# Mozart - Cache

installation with composer
==========================
```php
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar require mozart/cache 	// next typing "dev-master"
```

installation with git
=====================
```php
$ git clone https://github.com/FaizalPribadi/Cache.git /path/to/your-vendor/Cache
```

usage
=====

```php
<?php
require '../vendors/autoload.php';

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

usage : cache support with event
============================

```php
<?php
use Mozart\Library\Event\EventDispatcher;
use Mozart\Library\Cache\Event\DropCacheEvent;
use Mozart\Library\Cache\Event\CacheStatusEvent;

class DropListener
{

    public function onDropCacheEvent(DropCacheEvent $event)
    {
        $event->getCache()->getStatus();
        $event->stopPropagation();

        echo $event->getEvent();
    }
}

class DropCacheListenr
{
    protected $dispatcher;

    /**
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher = null)
    {
        if (null === $dispatcher) {
            $dispatcher = new EventDispatcher();
            $this->dispatcher = $dispatcher;
        }

        $listener = new DropListener();
        $listener->onDropCacheEvent(new DropCacheEvent());
        $this->dispatcher->addListener(CacheStatusEvent::CACHE_DROP_EVENT, array($listener, 'onDropCacheEvent'));
    }

    public function send()
    {
        $dropCache = new DropCacheEvent();
        return $this->dispatcher->dispatch(CacheStatusEvent::CACHE_DROP_EVENT, $dropCache);
    }
}

$listener = new DropCacheListenr();
var_dump($listener->send());
```

_For full details usage, see [Docs](https://github.com/FaizalPribadi/Cache/Docs/Documentation.md)_

You're own customize
====================
```php
<?php

//do something and customize this library

?>
```
