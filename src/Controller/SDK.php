<?php

namespace App\Controller;

use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Http\Exception\PermanentRedirectException;

class SDK extends ControllerAbstract
{
    #[Get]
    #[Path('/sdk/:project')]
    public function show(string $project): mixed
    {
        throw new PermanentRedirectException('https://sdk-fabric.org');
    }
}
