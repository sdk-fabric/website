<?php

namespace App\Controller;

use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Http\Exception\PermanentRedirectException;

class Contribute extends ControllerAbstract
{
    #[Get]
    #[Path('/contribute')]
    public function show(): mixed
    {
        throw new PermanentRedirectException('https://sdk-fabric.org');
    }
}
