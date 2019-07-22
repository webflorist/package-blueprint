<?php

namespace PackageBlueprintTests;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\Router;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Webflorist\PackageBlueprint\PackageBlueprintFacade;
use Webflorist\PackageBlueprint\PackageBlueprintServiceProvider;

/**
 * Class TestCase
 * @package PackageBlueprintTests
 */
class TestCase extends BaseTestCase
{
    /**
     * @var Repository
     */
    protected $config;
    /**
     * @var Router
     */
    protected $router;

    protected function getPackageProviders($app)
    {
        return [
            PackageBlueprintServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'PackageBlueprint' => PackageBlueprintFacade::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $this->router = $app[Router::class];
        $this->config = $app['config'];
    }


}