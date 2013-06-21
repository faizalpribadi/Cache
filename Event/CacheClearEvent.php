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

use Mozart\Library\Cache\Event\Status\ClearCache;

/**
 * Class CacheClearEvent
 *
 * @package Mozart\Library\Event
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class CacheClearEvent extends CacheEvent
{
    /**
     * @var Status\ClearCache
     */
    protected $cache;

    /**
     * Constructor
     *
     * @param ClearCache $cache
     */
    public function __construct(ClearCache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return ClearCache
     */
    public function getCache()
    {
        return $this->cache;
    }
}
