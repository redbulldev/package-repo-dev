<?php

namespace Rebbull;

use Illuminate\Support\ServiceProvider;
use Rebbull\Console\RepositoryMakeCommand;
use Rebbull\Console\RepositoryInterfaceMakeCommand;
use Rebbull\Console\ControllerMakeCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $commands = [
        RepositoryMakeCommand::class,
        RepositoryInterfaceMakeCommand::class,
        ControllerMakeCommand::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rebbull-demo');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'rebbull-demo');
    }
}

