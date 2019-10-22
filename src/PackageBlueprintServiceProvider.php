<?php

namespace Webflorist\PackageBlueprint;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Webflorist\StaticRoutes\Commands\PackageBlueprintCommand;

class PackageBlueprintServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();
        $this->registerService();
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->registerArtisanCommands();
        $this->loadMigrations();
        $this->loadTranslations();
        $this->loadViews();
        $this->setBladeDirectives();
    }

    protected function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/package-blueprint.php', 'package-blueprint');
    }

    protected function registerService()
    {
        $this->app->singleton(PackageBlueprintService::class, function () {
            return new PackageBlueprintService();
        });
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/package-blueprint.php' => config_path('package-blueprint.php'),
        ]);
    }

    protected function registerArtisanCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PackageBlueprintCommand::class
            ]);
        }
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    private function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . "/../resources/lang", "Webflorist-PackageBlueprint");
    }

    private function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'package-blueprint');
    }

    private function setBladeDirectives()
    {
        /** @var BladeCompiler $blade */
        $blade = app(BladeCompiler::class);
        $blade->directive('package_blueprint', function ($marker = 'default') {
            return "<?php echo 'package_blueprint' ?>";
        });
    }

    private function addMiddleware(string $middleware)
    {
        if($this->app['router']->hasMiddlewareGroup('web')) {
            $this->app['router']->pushMiddlewareToGroup('web', $middleware);
        }
    }
}