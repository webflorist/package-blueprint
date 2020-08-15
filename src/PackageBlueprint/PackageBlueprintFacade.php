<?php

namespace Webflorist\PackageBlueprint;

use Illuminate\Support\Facades\Facade;

class PackageBlueprintFacade extends Facade
{

    /**
     * Static access-proxy for the PackageBlueprint
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PackageBlueprintService::class;
    }

}