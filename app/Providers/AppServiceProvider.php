<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!$this->app->isProduction());
        Model::preventsSilentlyDiscardingAttributes(!$this->app->isProduction());
        Model::preventAccessingMissingAttributes(! $this->app->isProduction());
        Model::shouldBeStrict(! $this->app->isProduction());
        DB::whenQueryingForLongerThan(500, function (Connection $connection){

        });
    }
}
