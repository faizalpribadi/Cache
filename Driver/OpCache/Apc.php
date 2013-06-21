<?php
namespace Mozart\Library\Cache\Driver\OpCache;

/*
 * This file is a part of Mozart PHP Small MVC Framework
 *
 * (c) Faizal Pribadi <faizal_pribadi@aol.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * file that was distributed with this source code.
 */

use Mozart\Library\Cache\Driver\CacheDriver;
use Mozart\Library\Cache\Driver\CacheDriverInterface;
use Mozart\Library\Cache\Exception\ApcCacheException;

/**
 * Class Apc
 *
 * @package Mozart\Library\Cache\Driver\OpCache
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class Apc extends CacheDriver implements CacheDriverInterface
{
    /**
     * Constructor
     */
    public function __construct()
    {
        if (!extension_loaded('apc')) {
            throw new ApcCacheException('extension APC not loaded');
        }
    }

    /**
     * Set and store cache key with data content in cache key
     *
     * @param string $id
     * @param string $data
     * @param int    $lifeTime
     *
     * @return array|bool
     *
     * @throws \Mozart\Library\Cache\Exception\ApcCacheException
     */
    public function set($id, $data, $lifeTime = 0)
    {
        if (!function_exists('apc_store')) {
            throw new ApcCacheException('function [apc_store] not found !');
        }

        return apc_store($id, $data, $lifeTime);
    }

    /**
     * Get the cache key
     *
     * @param string $id
     *
     * @return bool|mixed
     */
    public function get($id)
    {
        if ($this->has($id)) {
            return apc_fetch($id);
        }

        return false;
    }

    /**
     * If exist cache key returned the key of cache
     *
     * @param string $id
     *
     * @return bool|null|\string[]
     */
    public function has($id)
    {
        if ($data = apc_exists($id)) {
            return $data;
        }

        return null;
    }

    /**
     * Removed the exist key from apc cache
     *
     * @param string $id
     *
     * @return bool|\string[]
     *
     * @throws \Mozart\Library\Cache\Exception\ApcCacheException
     */
    public function remove($id)
    {
        if (!$this->has($id)) {
            throw new ApcCacheException('unavailable cache data');
        }

        return apc_delete($id);
    }

    /**
     * Flushing cache user
     *
     * @return bool
     */
    public function flush()
    {
        return apc_clear_cache('user');
    }
}
