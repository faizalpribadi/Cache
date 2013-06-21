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
 * Class $CLASS
 *
 * @package
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
interface CacheInterface
{
    /**
     * @param $driver
     * @return mixed
     */
    public function setCacheDriver(CacheDriverInterface $driver);

    public function getCacheDriver();
}
