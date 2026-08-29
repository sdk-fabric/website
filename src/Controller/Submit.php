<?php

namespace App\Controller;

use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Http\Exception\PermanentRedirectException;

class Submit extends ControllerAbstract
{
    #[Get]
    #[Path('/submit')]
    public function show(): mixed
    {
        throw new PermanentRedirectException('https://app.sdk-fabric.org/login');
    }
}
