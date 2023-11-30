<?php

namespace App\Providers;

use App\Models\Jokes;
use App\Repositories\Interfaces\JokeRepositoryInterface;
use App\Repositories\JokeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JokeRepositoryInterface::class, JokeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
