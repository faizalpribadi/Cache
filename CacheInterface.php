<?php
namespace Mozart\Library\Cache;

/*
 * This file is a part of Mozart PHP Small MVC Framework
 *
 * (c) Faizal Pribadi <faizal_pribadi@aol.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * file that was distributed with this source code.
 */
use Mozart\Library\Cache\Driver\CacheDriverInterface;

/**
 * Interface CacheInterface
 *
 * @package Mozart\Library\Cache
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
interface CacheInterface
{
    /**
     * Set the cache driver
     *
     * @param CacheDriverInterface $driver
     *
     * @return mixed
     *
     * @api
     */
    public function setCacheDriver(CacheDriverInterface $driver);

    /**
     * Get the returned cache driver if set the cache driver
     *
     * @return CacheDriverInterface
     *
     * @api
     */
    public function getCacheDriver();
}
