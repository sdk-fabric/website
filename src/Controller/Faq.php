<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use Symfony\Component\Yaml\Yaml;

class Faq extends ControllerAbstract
{
    private const CACHE_KEY = 'questions';

    private ReverseRouter $reverseRouter;
    private CacheItemPoolInterface $cache;

    public function __construct(ReverseRouter $reverseRouter, CacheItemPoolInterface $cache)
    {
        $this->reverseRouter = $reverseRouter;
        $this->cache = $cache;
    }

    #[Get]
    #[Path('/faq')]
    public function show(): mixed
    {
        $questions = $this->cache->getItem(self::CACHE_KEY);
        if (!$questions->isHit()) {
            $questions->set(Yaml::parse((string) file_get_contents(__DIR__ . '/../../resources/content/questions.yaml')));
            $this->cache->save($questions);
        }

        $data = [
            'title' => 'FAQ | SDK Fabric',
            'method' => explode('::', __METHOD__),
            'questions' => $questions->get(),
        ];

        $templateFile = __DIR__ . '/../../resources/template/faq.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
