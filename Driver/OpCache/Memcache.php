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

use Mozart\Library\Cache\Compressed\CacheFlags;
use Mozart\Library\Cache\Driver\CacheDriver;
use Mozart\Library\Cache\Driver\CacheDriverInterface;
use Memcache as BaseMemcache;
use Mozart\Library\Cache\Exception\MemcacheException;

/**
 * Class Memcache
 *
 * @package Mozart\Library\Cache\Driver\OpCache
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class Memcache extends CacheDriver implements CacheDriverInterface
{
    /**
     *
     */
    protected $memcache;

    /**
     * Constructor
     */
    public function __construct()
    {
        if (!extension_loaded('memcache')) {
            throw new MemcacheException('extension memcache not loaded');
        }
    }

    /**
     * Set the constructor API class from Memcache::construct
     *
     * @param \Memcache $memcache
     */
    public function setMemcache(BaseMemcache $memcache)
    {
        $this->memcache = $memcache;
    }

    /**
     * @return BaseMemcache
     */
    public function getMemcache()
    {
        return $this->memcache;
    }

    /**
     * Set the data content for memcache cache provider
     *
     * @param string $id
     * @param string $data
     * @param int    $lifeTime
     *
     * @return mixed
     */
    public function set($id, $data, $lifeTime = 0)
    {
        if ($lifeTime > (int) 2592000) {
            $lifeTime = time() + $lifeTime;
        }

        return $this->memcache->add($id, $data, CacheFlags::CACHE_COMPRESSED, (int) $lifeTime);
    }

    /**
     * Get data content from cache key memcache
     *
     * @param  string $id
     * @return string
     *
     * @throws \Mozart\Library\Cache\Exception\MemcacheException
     */
    public function get($id)
    {
        if (function_exists('memcache_get')) {
            return $this->memcache->get($id);
        }

        throw new MemcacheException(
            sprintf('key id memcache "%s" not found, are you sure memcache_get function already loaded ?', $id)
        );
    }

    /**
     * Removed all the data cache from key cache of memcache
     *
     * @param string $id
     *
     * @return mixed
     */
    public function remove($id)
    {
        if ($this->get($id)) {
            return $this->memcache->delete($id);
        }
    }

    /**
     * Flushing all data cache content memcache
     *
     * @return mixed
     */
    public function flush()
    {
        return $this->memcache->flush();
    }

    /**
     * Initialize key id from list cache providers
     *
     * @param string $id
     *
     * @return mixed
     *
     * @api
     */
    public function has($id)
    {
        // Do something
    }
}
