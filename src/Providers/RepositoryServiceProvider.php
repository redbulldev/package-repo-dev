<?php

namespace Rebbull\Repo\Providers;

use Illuminate\Support\ServiceProvider;
use Rebbull\Repo\Console\RepositoryMakeCommand;
use Rebbull\Repo\Console\RepositoryInterfaceMakeCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $commands = [
        RepositoryMakeCommand::class,
        RepositoryInterfaceMakeCommand::class
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
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }
}

