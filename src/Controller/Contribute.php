<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use Symfony\Component\Yaml\Yaml;

class Contribute extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;

    public function __construct(ReverseRouter $reverseRouter)
    {
        $this->reverseRouter = $reverseRouter;
    }

    #[Get]
    #[Path('/contribute')]
    public function show(): mixed
    {
        $data = [
            'method' => explode('::', __METHOD__),
        ];

        $templateFile = __DIR__ . '/../../resources/template/contribute.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
