<?php
/**
 * @author Persi.Liao
 * @email xiangchu.liao@gmail.com
 * @link https://www.github.com/persiliao/filesystem
 */
declare(strict_types=1);

namespace PersiLiao\Filesystem;

use League\Flysystem\AdapterInterface;
use League\Flysystem\Config;
use League\Flysystem\Filesystem;
use PersiLiao\Filesystem\Contract\AdapterFactoryInterface;
use PersiLiao\Filesystem\Exception\InvalidArgumentException;

class FilesystemFactory
{
    /**
     * @var array
     */
    private $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function get($adapterName): Filesystem
    {
        if(!isset($this->config[$adapterName]) || empty($this->config[$adapterName]) || !isset
            ($this->config[$adapterName]['driver']) || empty($this->config[$adapterName]['driver'])){
            throw new InvalidArgumentException("file configurations are missing {$adapterName} options");
        }
        $adapter = $this->getAdapter($adapterName);
        return new Filesystem($adapter, new Config($this->config[$adapterName]));
    }

    protected function getAdapter($adapterName): AdapterInterface
    {
        /** @var AdapterFactoryInterface $driver */
        $driver = new $this->config[$adapterName]['driver'];
        return $driver->make($this->config[$adapterName]);
    }
}