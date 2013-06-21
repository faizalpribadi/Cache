<?php
namespace Mozart\Library\Cache\Event;

/*
 * This file is a part of Mozart PHP Small MVC Framework
 *
 * (c) Faizal Pribadi <faizal_pribadi@aol.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * file that was distributed with this source code.
 */

use Mozart\Library\Cache\Event\Status\DropCache;

/**
 * Class DropCacheEvent
 *
 * @package Mozart\Library\Event
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class DropCacheEvent extends CacheEvent
{
    /**
     * @var Status\DropCache
     */
    protected $cache;

    /**
     * Constructor
     *
     * @param DropCache $cache
     */
    public function __construct(DropCache $cache = null)
    {
        $this->cache = $cache ? : new DropCache();
    }

    /**
     * @return DropCache
     */
    public function getCache()
    {
        return $this->cache;
    }
}
