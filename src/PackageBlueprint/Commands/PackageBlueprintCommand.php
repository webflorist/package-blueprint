<?php

namespace Webflorist\StaticRoutes\Commands;

use Illuminate\Console\Command;

class PackageBlueprintCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package-blueprint:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Package Blueprint command.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Package Blueprint command successful.");
    }

}
