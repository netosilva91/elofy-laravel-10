<?php

namespace App\Providers;

use App\Repositories\{
    FeedbackEloquentORM,
    FeedbackRepositoryInterface,
    SupportEloquentORM,
    SupportRepositoryInterface,
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquentORM::class
        );

        $this->app->bind(
            FeedbackRepositoryInterface::class,
            FeedbackEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
