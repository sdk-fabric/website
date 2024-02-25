<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use Symfony\Component\Yaml\Yaml;

class Index extends ControllerAbstract
{
    private const CACHE_KEY = 'features';

    private ReverseRouter $reverseRouter;
    private CacheItemPoolInterface $cache;

    public function __construct(ReverseRouter $reverseRouter, CacheItemPoolInterface $cache)
    {
        $this->reverseRouter = $reverseRouter;
        $this->cache = $cache;
    }

    #[Get]
    #[Path('/')]
    public function show(): mixed
    {
        $repositories = $this->cache->getItem(self::CACHE_KEY);
        if (!$repositories->isHit()) {
            $repositories->set(Yaml::parse(file_get_contents(__DIR__ . '/../../public/repository.json')));
            $this->cache->save($repositories);
        }

        $data = [
            'method' => explode('::', __METHOD__),
            'repositories' => $repositories->get(),
        ];

        $templateFile = __DIR__ . '/../../resources/template/index.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
