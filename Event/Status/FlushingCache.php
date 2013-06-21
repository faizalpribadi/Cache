<?php
namespace Mozart\Library\Cache\Event\Status;

/*
 * This file is a part of Mozart PHP Small MVC Framework
 *
 * (c) Faizal Pribadi <faizal_pribadi@aol.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * file that was distributed with this source code.
 */

/**
 * Class FlushingCache
 *
 * @package Mozart\Library\Event\Status
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class FlushingCache
{
    /**
     *
     */
    protected $flushingCache;

    /**
     * @param $flushingCache
     */
    public function setFlushingCache($flushingCache)
    {
        $this->flushingCache = $flushingCache;
    }

    /**
     * @return mixed
     */
    public function getFlushingCache()
    {
        return $this->flushingCache;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->flushingCache = 'flushing cache successfully';
    }
}
