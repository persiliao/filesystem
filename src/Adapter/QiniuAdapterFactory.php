<?php
/**
 * @author Persi.Liao
 * @email xiangchu.liao@gmail.com
 * @link https://www.github.com/persiliao/filesystem
 */
declare(strict_types=1);

namespace PersiLiao\Filesystem\Adapter;

use Overtrue\Flysystem\Qiniu\QiniuAdapter;
use PersiLiao\Filesystem\Contract\AdapterFactoryInterface;
use League\Flysystem\AdapterInterface;

class QiniuAdapterFactory implements AdapterFactoryInterface
{
    public function make(array $options): AdapterInterface
    {
        return new QiniuAdapter($options['accessKey'], $options['secretKey'], $options['bucket'], $options['domain']);
    }
}