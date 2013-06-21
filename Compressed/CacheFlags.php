<?php
namespace Mozart\Library\Cache\Compressed;

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
 * Class CacheFlags
 *
 * @package Mozart\Library\Cache\Compressed
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
final class CacheFlags
{
    /**
     * Compressed cache
     */
    const CACHE_COMPRESSED      = 2;

    /**
     * Cache end session
     */
    const CACHE_END_SESSION     = 1;

    /**
     * Get back cache
     */
    const CACHE_WAKEUP          = 0;

    /**
     * Cache lifetime expires
     */
    const CACHE_LIFETIME        = 3600;
}
