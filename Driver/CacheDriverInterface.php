<?php
namespace Mozart\Library\Cache\Driver;

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
 * Interface CacheDriverInterface
 *
 * @package Mozart\Library\Cache\Driver
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
interface CacheDriverInterface
{
    /**
     * Set the cache key and set the data to store to cache
     * The cache list providers exclude from packages Cache "OpCache"
     *
     * @param string $id
     * @param string $data
     * @param int    $lifeTime
     *
     * @return mixed
     *
     * @api
     */
    public function set($id, $data, $lifeTime = 0);

    /**
     * Get the id key from cache on cache providers list
     *
     * @param string $id
     *
     * @return mixed
     *
     * @api
     */
    public function get($id);

    /**
     * Initialize key id from list cache providers
     *
     * @param string $id
     *
     * @return mixed
     *
     * @api
     */
    public function has($id);

    /**
     * Removed all data content and id key from cache providers list
     *
     * @param string $id
     *
     * @return mixed
     *
     * @api
     */
    public function remove($id);

    /**
     * Clearing data user from cache providers list
     *
     * @return mixed
     *
     * @api
     */
    public function flush();
}
