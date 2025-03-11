<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use PSX\Http\Exception\NotFoundException;
use Symfony\Component\Yaml\Yaml;

class SDK extends ControllerAbstract
{
    private const CACHE_KEY = 'projects';

    private ReverseRouter $reverseRouter;
    private CacheItemPoolInterface $cache;

    public function __construct(ReverseRouter $reverseRouter, CacheItemPoolInterface $cache)
    {
        $this->reverseRouter = $reverseRouter;
        $this->cache = $cache;
    }

    #[Get]
    #[Path('/sdk/:project')]
    public function show(string $project): mixed
    {
        $cacheItem = $this->cache->getItem(self::CACHE_KEY);
        if (!$cacheItem->isHit()) {
            $cacheItem->set(Yaml::parse((string) file_get_contents(__DIR__ . '/../../public/projects.json')));
            $this->cache->save($cacheItem);
        }

        $projects = $cacheItem->get();
        if (!isset($projects[$project])) {
            throw new NotFoundException('Provided SDK does not exist');
        }

        $data = [
            'title' => ucfirst($project) . ' SDK | SDK Fabric',
            'method' => explode('::', __METHOD__),
            'urlParameters' => ['project' => $project],
            'name' => $project,
            'project' => $projects[$project],
        ];

        $templateFile = __DIR__ . '/../../resources/template/sdk.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
