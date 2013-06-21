<?php
namespace Mozart\Library\Cache\Event;

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
 * Class CacheStatusEvent
 *
 * @package Mozart\Library\Cache\Event
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
final class CacheStatusEvent
{
    /**
     * Clear cache event
     */
    const CACHE_CLEAR_EVENT         = 'event.clear.cache';

    /**
     * Drop cache event
     */
    const CACHE_DROP_EVENT          = 'event.drop.cache';

    /**
     * Flushing cache event
     */
    const CACHE_FLUSHING_EVENT      = 'event.flushing.cache';
}
