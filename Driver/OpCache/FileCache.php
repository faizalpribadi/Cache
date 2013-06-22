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
use Mozart\Library\Cache\Exception\FileCacheException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class FileCache
 *
 * @package Mozart\Library\Cache\Driver\OpCache
 * @author  Faizal Pribadi  <faizal_pribadi@aol.com>
 */
class FileCache extends CacheDriver implements CacheDriverInterface
{
    /**
     *
     */
    const CACHE_EXTENSION_NAME = '.php.cache';

    /**
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     *
     */
    protected $directory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fileSystem = new Filesystem();
        $this->directory = null ? : sys_get_temp_dir();
    }

    /**
     * Set the directory to store you're cache
     *
     * @param string|__DIR__ $directory
     *
     * @throws \Mozart\Library\Cache\Exception\FileCacheException
     */
    public function setDirectory($directory)
    {
        if (!is_dir($directory) && !is_writable($directory)) {
            throw new FileCacheException(
                sprintf('The directory "%s" is not directory and not writable', $directory)
            );
        }

        if (is_null($directory) && !$this->getFilesystem()->mkdir($directory, 0777, true)) {
            throw new FileCacheException(
                sprintf('The directory "%s" not be null and directory not be created')
            );
        }

        $this->directory = realpath($directory);
    }

    /**
     * @return Filesystem
     */
    public function getFilesystem()
    {
        return $this->fileSystem;
    }

    /**
     * {@inheritdoc}
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Get the filename id of cache
     *
     * @param string $id
     *
     * @return string
     */
    public function getFilename($id)
    {
        return $this->directory . DIRECTORY_SEPARATOR . $id . self::CACHE_EXTENSION_NAME;
    }

    /**
     * @see Mozart\Library\Cache\Driver\DriverInterface::set
     */
    public function set($id, $data, $lifeTime = 0)
    {
        if ($lifeTime > 0) {
            $lifeTime = time() + $lifeTime;
        }

        $filename = $this->getFilename($id);
        $options  = array(
            'data'      => $data,
            'lifetime'  => $lifeTime
        );

        return file_put_contents($filename, serialize($options));
    }

    /**
     * @see Mozart\Library\Cache\Driver\DriverInterface::get
     */
    public function get($id)
    {
        $filenameId = $this->has($id);

        if (!$filenameId) {
            return false;
        }

        $filename = @include $filenameId;

        if ($filename['lifetime'] !== 0 && $filename['lifetime'] < 3600) {
            return $prefend = false;
        }

        return unserialize($filename['data']);
    }

    /**
     * @see Mozart\Library\Cache\Driver\DriverInterface::has
     */
    public function has($id)
    {
        return $this->findFile($id);
    }

    /**
     * @see Mozart\Library\Cache\Driver\DriverInterface::remove
     */
    public function remove($id)
    {
        return @unlink($this->getFilesystem()->remove($this->getFilename($id)));
    }

    /**
     * @see Mozart\Library\Cache\Driver\DriverInterface::flush
     */
    public function flush()
    {
        return null;
    }

    /**
     * Find the file id if exist id key from set cache
     *
     * @param string $id
     *
     * @return null|string
     */
    protected function findFile($id)
    {
        $filename = $this->getFilename($id);

        if ($filename) {
            return $filename;
        }

        return null;
    }
}
