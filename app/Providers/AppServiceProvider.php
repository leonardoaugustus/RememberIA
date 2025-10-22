<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[\Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');

        // Prevent Lazy Loading in non-production environments
        Model::preventLazyLoading(! $this->app->isProduction());

        // Remove the need of the property fillable on each model
        Model::unguard();

        // --
        // Make sure that all properties being called exists in the model
        Model::shouldBeStrict();

        // prohibit Destruct commands
        DB::prohibitDestructiveCommands($this->app->isProduction());

        //
        $this->setLogViewer();
    }

    private function setLogViewer(): void
    {
        LogViewer::auth(function ($request) {
            return $request->user() && $request->user()->is_admin;
        });
    }
}
