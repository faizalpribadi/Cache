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
 * Class DropCache
 *
 * @package Mozart\Library\Event\Status
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class DropCache
{
    /**
     *
     */
    protected $dropCache;

    /**
     * @param $dropCache
     */
    public function setDropCache($dropCache)
    {
        $this->dropCache = $dropCache;
    }

    /**
     * @return mixed
     */
    public function getDropCache()
    {
        return $this->dropCache;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->dropCache = 'droping cache successfully';
    }
}
