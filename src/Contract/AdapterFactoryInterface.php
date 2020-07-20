<?php
/**
 * @author Persi.Liao
 * @email xiangchu.liao@gmail.com
 * @link https://www.github.com/persiliao/filesystem
 */
declare(strict_types=1);

namespace PersiLiao\Filesystem\Contract;

use League\Flysystem\AdapterInterface;

interface AdapterFactoryInterface
{
    public function make(array $options): AdapterInterface;
}