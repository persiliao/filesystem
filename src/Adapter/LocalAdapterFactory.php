<?php
/**
 * @author Persi.Liao
 * @email xiangchu.liao@gmail.com
 * @link https://www.github.com/persiliao/filesystem
 */
declare(strict_types=1);

namespace PersiLiao\Filesystem\Adapter;

use League\Flysystem\Adapter\Local;
use League\Flysystem\AdapterInterface;
use PersiLiao\Filesystem\Contract\AdapterFactoryInterface;
use PersiLiao\Filesystem\Exception\InvalidArgumentException;

class LocalAdapterFactory implements AdapterFactoryInterface
{
    public function make(array $options): AdapterInterface
    {
        if(!isset($options['root']) || empty($options['root'])){
            throw new InvalidArgumentException("file configurations are missing root option");
        }
        return new Local($options['root']);
    }
}