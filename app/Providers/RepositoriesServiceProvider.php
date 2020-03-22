<?php

namespace App\Providers;



use App\Repositories\UserRepositories;
use App\Repositories\UserRepositoriesInterface;
use App\Repositories\CenterRepositories;
use App\Repositories\CenterRepositoriesInterface;
use App\Repositories\DamageRepositories;
use App\Repositories\DamageRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       /* $this->app->bind(UserRepositoriesInterface::class,UserRepositories::class);
        $this->app->bind(DamageRepositoriesInterface::class,DamageRepositories::class);
        $this->app->bind(CenterRepositoriesInterface::class,CenterRepositories::class); */
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoriesInterface::class,UserRepositories::class);
        $this->app->bind(DamageRepositoriesInterface::class,DamageRepositories::class);
        $this->app->bind(CenterRepositoriesInterface::class,CenterRepositories::class);
    }
}
