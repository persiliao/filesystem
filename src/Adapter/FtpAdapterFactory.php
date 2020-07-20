<?php
/**
 * @author Persi.Liao
 * @email xiangchu.liao@gmail.com
 * @link https://www.github.com/persiliao/filesystem
 */
declare(strict_types=1);

namespace PersiLiao\Filesystem\Adapter;

use League\Flysystem\Adapter\Ftp;
use League\Flysystem\AdapterInterface;
use PersiLiao\Filesystem\Contract\AdapterFactoryInterface;

class FtpAdapterFactory implements AdapterFactoryInterface
{
    public function make(array $options): AdapterInterface
    {
        return new Ftp($options);
    }
}