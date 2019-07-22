<?php

use Webflorist\PackageBlueprint\PackageBlueprintService;

if (! function_exists('package-blueprint')) {
    /**
     * Gets the PackageBlueprintService singleton from Laravel's service-container
     *
     * @return PackageBlueprintService
     */
    function package_blueprint()
    {
        return app(PackageBlueprintService::class);
    }
}