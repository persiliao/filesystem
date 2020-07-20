<?php
/**
 * @author Persi.Liao
 * @email xiangchu.liao@gmail.com
 * @link https://www.github.com/persiliao/filesystem
 */
declare(strict_types=1);

namespace PersiLiao\Filesystem\Adapter;

use Aws\S3\S3Client;
use League\Flysystem\AdapterInterface;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use PersiLiao\Filesystem\Contract\AdapterFactoryInterface;

class S3AdapterFactory implements AdapterFactoryInterface
{
    public function make(array $options): AdapterInterface
    {
        $client = new S3Client($options);
        return new AwsS3Adapter($client, $options['bucket_name'], '', [ 'override_visibility_on_copy' => true ]);
    }
}