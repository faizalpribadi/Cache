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
use Mozart\Library\Cache\Exception\DriverException;

/**
 * Class Cache for set the driver cache from cache providers list
 *
 * @package Mozart\Library\Cache
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class Cache implements CacheInterface
{
    /**
     *
     */
    protected $driver;

    /**
     * Constructor
     *
     * @param null $driver
     *
     * @throws DriverException
     */
    public function __construct($driver = null)
    {
        if (null === $driver) {
            throw new DriverException(
                sprintf('The driver "%s" from cache providers list not set', $driver)
            );
        }

        $this->setCacheDriver($driver);
    }

    /**
     * Set the driver cache from cache providers list
     *
     * @param CacheDriverInterface $driver
     *
     * @return mixed|void
     */
    public function setCacheDriver(CacheDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Get returned the cache driver
     *
     * @return CacheDriverInterface
     */
    public function getCacheDriver()
    {
        return $this->driver;
    }

    /**
     * @see Mozart\Library\Cache\Driver\CacheDriverInterface::set
     */
    public function set($id, $data, $lifeTime = 0)
    {
        return $this->getCacheDriver()->set($id, $data, $lifeTime);
    }

    /**
     * @see Mozart\Library\Cache\Driver\CacheDriverInterface::get
     */
    public function get($id)
    {
        return $this->getCacheDriver()->get($id);
    }

    /**
     * @see Mozart\Library\Cache\Driver\CacheDriverInterface::remove
     */
    public function remove($id)
    {
        $this->getCacheDriver()->remove($id);
    }

    /**
     * @see Mozart\Library\Cache\Driver\CacheDriverInterface::flush
     */
    public function flush()
    {
        return $this->getCacheDriver()->flush();
    }
}
