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
 * Class CacheStatus
 *
 * @package Mozart\Library\Cache\Event\Status
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class CacheStatus
{
    protected $clearCache;
    protected $dropCache;
    protected $flushingCache;

    /**
     * Constructor
     *
     * @param ClearCache    $clearCache
     * @param DropCache     $dropCache
     * @param FlushingCache $flushingCache
     */
    public function __construct(ClearCache $clearCache = null,
                                DropCache $dropCache = null,
                                FlushingCache $flushingCache = null)
    {
        $this->clearCache       = $clearCache ? : new ClearCache();
        $this->dropCache        = $dropCache ? : new DropCache();
        $this->flushingCache    = $flushingCache ? : new FlushingCache();
    }

    /**
     * @return ClearCache
     */
    public function getClearCache()
    {
        return $this->clearCache;
    }

    /**
     * @return DropCache
     */
    public function getDropCache()
    {
        return $this->dropCache;
    }

    /**
     * @return FlushingCache
     */
    public function getFlushingCache()
    {
        return $this->flushingCache;
    }
}
