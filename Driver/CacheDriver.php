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

use Mozart\Library\Cache\Event\Status\CacheStatus;
use Mozart\Library\Cache\Exception\CacheException;

/**
 * Class CacheDriver
 *
 * @package Mozart\Library\Cache\Driver
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class CacheDriver extends CacheStatus
{
    /**
     * {@inheritdoc}
     */
    public function clearCache()
    {
        throw new CacheException(
            sprintf('Info: "%s" ', $this->getClearCache()->getStatus())
        );
    }

    /**
     * {@inheritdoc}
     */
    public function dropCache()
    {
        throw new CacheException(
            sprintf('Info: "%s" ', $this->getDropCache()->getStatus())
        );
    }

    /**
     * {@inheritdoc}
     */
    public function flushingCache()
    {
        throw new CacheException(
            sprintf('Info: "%s" ', $this->getFlushingCache()->getStatus())
        );
    }
}
