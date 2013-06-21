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

use Mozart\Library\Cache\Event\Status\FlushingCache;

/**
 * Class FlushingCacheEvent
 *
 * @package Mozart\Library\Event
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class FlushingCacheEvent extends CacheEvent
{
    /**
     * @var Status\FlushingCache
     */
    protected $cache;

    /**
     * Constructor
     *
     * @param FlushingCache $cache
     */
    public function __construct(FlushingCache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return FlushingCache
     */
    public function getCache()
    {
        return $this->cache;
    }
}
