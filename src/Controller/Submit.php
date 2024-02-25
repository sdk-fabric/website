<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;

class Submit extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;

    public function __construct(ReverseRouter $reverseRouter, CacheItemPoolInterface $cache)
    {
        $this->reverseRouter = $reverseRouter;
    }

    #[Get]
    #[Path('/submit')]
    public function show(): mixed
    {
        $data = [
            'title' => 'Submit | SDK Fabric',
            'method' => explode('::', __METHOD__),
        ];

        $templateFile = __DIR__ . '/../../resources/template/submit.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
