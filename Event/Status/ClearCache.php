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
 * Class ClearCache
 *
 * @package Mozart\Library\Event\Status
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class ClearCache
{
    /**
     *
     */
    protected $clearCache;

    /**
     * @param $clearCache
     */
    public function setClearCache($clearCache)
    {
        $this->clearCache = $clearCache;
    }

    /**
     * @return mixed
     */
    public function getClearCache()
    {
        return $this->clearCache;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->clearCache = 'cache clearing successfully';
    }
}
