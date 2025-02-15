<?php

namespace App\Providers;

use App\Contracts\ExtractorInterface;
use App\Contracts\IdentityRepositoryInterface;
use App\Contracts\PostRepositoryInterface;
use App\Extractors\ApiDataExtractor;
use App\Repositories\IdentityRepository;
use App\Repositories\PostRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IdentityRepositoryInterface::class, IdentityRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Paginator::useBootstrap();
    }
}
